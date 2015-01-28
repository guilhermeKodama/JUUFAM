<?php

Yii::import('application.extensions.*');
require_once('fpdf/fpdf.php');

class RelatorioController extends Controller
{
	public function actionIndex()
	{
    	$this->render('index');
	}

	public function actionPrint() 
	{
	    $id_modalidade = $_GET["modalidade"];
	    $id_curso = $_GET["curso"];
	    
	    $sql = "SELECT modalidade.nome AS modalidade, time.id, curso.nome AS curso FROM time JOIN modalidade ON time.id_modalidade = modalidade.id JOIN curso ON curso.id = time.id_curso";
	    
	    if ($id_curso != "0" || $id_modalidade != "0") {
	        $sql .= " WHERE ";    
	    }
	    
	    $flagAnt = 0;
	    
	    if ($id_curso != "0") {
	        $sql .= "id_curso LIKE '" . $id_curso . "'";   
	        $flagAnt = 1;
	    }
	    
	    if ($id_modalidade != "0") {
	        if ($flagAnt == 1) {
	            $sql .= " AND ";    
	        }
	        $sql .= "id_modalidade LIKE '" . $id_modalidade . "'";   
	    }
	    
	    function converte($string){
	        return iconv("UTF-8", "ISO-8859-1", $string);
	    }
	    
	    $pdf = new FPDF("P", "pt", "A4");
	    $pdf->AddPage();
	    $pdf->Ln(3);
	    
	    $pdf->Image(Yii::app()->basePath . '/images/braso.png', 10, 7);
	    $pdf->Image(Yii::app()->basePath . '/images/ufam.png', 500,15);
	    
	    $pdf->SetFont("arial", "B", 12);
	    $pdf->Cell(0,5,"PODER EXECUTIVO", 0,1,"C");
	    $pdf->SetFont("arial", "B", 10);
	    $pdf->Cell(0,25,converte("MINISTÉRIO DA EDUCAÇÃO"), 0,1,"C");
	    $pdf->Cell(0,5,"UNIVERSIDADE FEDERAL DO AMAZONAS", 0,1,"C");
	    $pdf->Ln(30);
	    $pdf->Cell(0,10,converte("PRÓ-REITORIA PARA ASSUNTOS COMUNITÁRIOS"), 0,1,"C");
	    $pdf->Line(10,114,580,114);	
	    
	    $pdf->SetFont("arial", "B", 12);
	    $titulo = "RELATÓRIO";
	    
	    if ($id_curso == "0" && $id_modalidade == "0") {
	         $titulo .= " GERAL ";    
	    }
	    
	    if ($id_curso != "0") {
	        $titulo .= " INSCRITOS POR CURSO ";    
	    }
	    
	    if ($id_modalidade != "0") {
	         $titulo .= " INSCRITOS POR MODALIDADE";    
	    }

	    $pdf->Cell(0,50,converte($titulo),0,1,"C");
	    
	    $pdf->Ln(10);

		$curso = Yii::app()->db->createCommand($sql)->queryAll();

		foreach ($curso as $key => $linha) {			
	        $id_time = $linha["id"];
	        $sql2 = "SELECT atleta.nome, atleta.cpf as matricula, curso.nome AS curso FROM atleta JOIN time_atletas ON atleta.cpf = time_atletas.id_atleta JOIN curso ON curso.id = atleta.id_curso WHERE time_atletas.id_time = " . $id_time ;
	        
			$atletas = Yii::app()->db->createCommand($sql2)->queryAll();

	        $pdf->SetFont("arial", "B", 12);
	        $pdf->Cell(0,50,converte("Modalidade: " . $linha["modalidade"]),0,1,"L");
	        $pdf->SetFont("arial", "", 12);
	        $pdf->Cell(0,0,converte("Time: " . $linha["id"]),0,1,"L");
	        $pdf->Ln(15);
	                
	        $pdf->SetFont("arial", "B", 12);
	        $pdf->Cell(100, 20, 'CPF', 1, 0, "L");
	        $pdf->Cell(200, 20, 'Atleta',1,0,"L");
	        $pdf->Cell(200, 20, 'Curso',1,0,"L");
	       
	        $pdf->Ln(20);
	        $pdf->SetFont("arial", "", 12);
	        
	        foreach ($atletas as $key => $linha2) {
	            $pdf->Cell(100, 20, $linha2["matricula"],1 ,0, "L");
	            $pdf->Cell(200, 20, $linha2["nome"],1 ,0, "L");
	            $pdf->Cell(200, 20, $linha2["curso"],1 ,0, "L");
	            $pdf->Ln(20);
	        }
	    }

		$this->layout=false;
		header('Content-type: application/pdf');
		$pdf->Output("inscritoscurso.pdf", "I");		
		Yii::app()->end(); 	    
	}
}