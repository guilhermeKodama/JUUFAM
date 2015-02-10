<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.css');
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.min.css');


$this->breadcrumbs=array(
	'Certificado',
);
?>


</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Certificado</b></h1></div>
<hr>

<form method="get" action="<?php echo Yii::app()->createUrl('relatorio/print'); ?>">

    </br> <form action="" method="post">
    <center> <p><b><h5>Insira o tipo de participação do inscrito:</h5><b></p>
        <div class="form-inline">
		<input type="text" class="form-control" name="tipo" placeholder="Tipo de participação" aria-describedby="basic-addon1">
        </div></center>

        
    <center> <p><b><h5>Insira o nome do inscrito:</h5><b></p>
        <div class="form-inline">
		<input type="text" class="form-control" name="name" placeholder="Nome do inscrito" aria-describedby="basic-addon1">
        </div></center>
     </form>
    
    <span style="padding-left:20px"></span>
 <input type="hidden" name="r" value="certificado/print" />
<p>  <div>
        <center><button type="submit" name="submit-certificado" class="btn btn-primary">Gerar Certificado</button></center>
		
    </div></p>
    </br></br></br></br></br></br></br>