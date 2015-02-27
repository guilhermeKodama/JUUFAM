<?php


Yii::import('application.extensions.*');
require_once('fpdf/fpdf.php');


class CertificadoController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

        public function actionPrint() 
	{

               
           $nameInscrito = $_GET["name"]; 
           $tipoParticipacao = $_GET["tipo"];
          
            
            function converte($string){
	        return iconv("UTF-8", "ISO-8859-1", $string);
	    }
            
            
            $pdf = new FPDF("L", "pt", "A4");
	    $pdf->AddPage();
	    $pdf->Ln(3);
	  
	    
	    $pdf->Image(Yii::app()->basePath . '/modelo_certificado/modelo-oficial.png', -15,0);
	    
	    $pdf->SetFont("arial", "I", 26);
            $pdf->Cell(1000,294,"",100,1,"C");
            $pdf->Cell(1000,0,converte("" . $nameInscrito),100,100,"C");
            
         
            
            $pdf->Cell(700,60,converte("" . $tipoParticipacao),100,100,"R");
            
                
	    $pdf->Ln(10);
            
            $this->layout=false;
		header('Content-type: application/pdf');
		$pdf->Output(".$nameInscrito.pdf", "I");		
		Yii::app()->end(); 	    
	
            
        
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}

}
?>
