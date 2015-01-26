<?php
    
    $id_modalidade = $_POST["modalidade"];
    $id_curso = $_POST["curso"];
    
   
    
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
    
    $con = mysqli_connect("localhost", "root", "", "juufam");
    
    $curso = mysqli_query($con, $sql);
    
    
    require 'protected/extensions/fpdf/fpdf.php';
    
    function converte($string){
        return iconv("UTF-8", "ISO-8859-1", $string);
    }
    
    $pdf = new FPDF("P", "pt", "A4");
    $pdf->AddPage();
    $pdf->Ln(3);
    
    $pdf->Image('images/braso.png', 10, 7);
    $pdf->Image('images/ufam.png', 500,15);
    
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
    
    //$pdf->Cell(0, 5, converte("Relatório"), 0, 1, "C");
    $pdf->Ln(10);
    

    while($linha = mysqli_fetch_array($curso)){
        
        $id_time = $linha["id"];
        $sql2 = "SELECT atleta.nome, atleta.matricula, curso.nome AS curso FROM atleta JOIN time_atletas ON atleta.cpf = time_atletas.id_atleta JOIN curso ON curso.id = atleta.id_curso WHERE time_atletas.id_time = " . $id_time ;
        
        $atletas = mysqli_query($con, $sql2);
        
    
        
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
        
        
        while($linha2 = mysqli_fetch_array($atletas)){
            $pdf->Cell(100, 20, $linha2["matricula"],1 ,0, "L");
            $pdf->Cell(200, 20, $linha2["nome"],1 ,0, "L");
            $pdf->Cell(200, 20, $linha2["curso"],1 ,0, "L");
           
            
            $pdf->Ln(20);
            
       
        }
        
        
            
    }
    
        
//    }
   
    $pdf->Output("inscritoscurso.pdf", "I");
?>