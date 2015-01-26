<?php


//$html="
//<center><img src='imagens/logo.png' width='100' height='100'></center>
//<center><h3>Curriculo</h3></center>
//<h1>titulo</h1>
//
//
//
//";




class RelatorioController extends Controller
{
	public function actionIndex()
	{
            $this->render('index');            
       /*    $html =' <html>

 <head><h1><center>JJDJDJD</center></h1>
 
<div align="left"><img src="images/braso.png"></left> 
<div align="right"><IMG SRC="images/ufam.png"></div> 


</head>







<hr>



<h1>Teste</h1>

<h2>Teste</h2>

 

<p> Teste!</p>

<p> Teste!</b></p>

<br> <b><i>Teste.</i></b>  

<hr>

 

</html> ';
            
         /*  $mpdf = Yii::app()->ePdf->mpdf();
           $mpdf = new mPDF('utf-8');
           //$mpdf->writingHTMLheader = true;
           $mpdf->AddPage();
           $mpdf->WriteHTML($html);
           $mpdf->Output();
           */ 
           
            
		//$this->render('index');
	}

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
        
      /*  public function actionPDF()
	{
      
            $html =' <html> <body> <p>Sou umpequeno parágrafo</p> </body> </html> ';
            
            
		
	}*/

        
        
}