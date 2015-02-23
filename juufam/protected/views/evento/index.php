<?php
/* @var $this CriarEventoController */
$this->breadcrumbs = array (
		'Criar Evento' 
);
?>
<!-- import javascript -->
<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.css');
$cs->registerScriptFile ( $baseUrl . '/css/bootstrap.min.css');
?>




</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Criar Nova Edição</b></h1></div>
<hr>

<form  enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Evento/Criar'?>">
	
	<?php if(isset($erro["nameEvent"])){echo '<font size="2" color="red">'.$erro["nameEvent"].'</font>';}?>
    <p><b><h5>Insira o nome da edição deste evento:</h5><b></p>
        <div class="form-inline">
		<input type="text" class="form-control" name="nameEvent" placeholder="Nome da edição" aria-describedby="basic-addon1">
	</div>
	<div class="form-inline">
            <p><b><h5>Insira a data de início e fim deste evento:</h5><b></p>
	<?php if(isset($erro["dateIniEvent"])){echo '<font size="2" color="red">'.$erro["dateIniEvent"].'</font>';}?>
		<input class="form-control" id="dateIniEvent" name="dateIniEvent" type="date"
			placeholder="Data inicio evento" aria-describedby="basic-addon1"> 
	<?php if(isset($erro["dateEndEvent"])){echo '<font size="2" color="red">'.$erro["dateEndEvent"].'</font>';}?>
		<input class="form-control" id="dateEndEvent" name="dateEndEvent" type="date"
			placeholder="Data fim evento" aria-describedby="basic-addon1">
	</div>
    <p><b><h5>Insira a data de início e fim das incrições:</h5><b></p>
	<div class="form-inline" >
	<?php if(isset($erro["dateIniInscr"])){echo '<font size="2" color="red">'.$erro["dateIniInscr"].'</font>';}?>
		<input class="form-control" id="dateIniInscr" name="dateIniInscr" type="date"
			placeholder="Data inicio inscricão"> 
	<?php if(isset($erro["dateEndInscr"])){echo '<font size="2" color="red">'.$erro["dateEndInscr"].'</font>';}?>
                <input class="form-control" id="dateEndInscr" name="dateEndInscr" type="date"
			placeholder="Data fim inscricão">
	</div>
	<!-- 
	<div class="form-inline">
            <p><b><h5>Insira o Modelo do Certificado que será utilizado neste evento:</h5></b></p>
        	<input class="form-control" type="file" id="userfile" name="userfile"
			accept="application/png">
	</div> -->

    <p><b><h5>Selecione as modalidades que estarão nesta edição:</h5></b></p>
	<div class="checkbox">
            <label>
            
	<?php if(isset($erro["modalidades"])){echo '<font size="2" color="red">'.$erro["modalidades"].'</font>';}?>
		
	<?php
	/* Mostrar os eventos */
	$mEventoController = new ModalidadeController ('modalidade');
	$models = $mEventoController->getAllModality ();
	
        
	foreach ( $models as $model ) {
		echo '<input type="checkbox"  name="modalidades[]" value="' . $model->id . '">' . $model->nome . ' ' . $model->tipo_modalidade . ' ' . $model->genero . '<br>';
	}
	
	?>
        </label>
	</div>
        <p>
	<div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
		
	</div>
        </p>
</form>



<script type="text/javascript">
jQuery(function($){
	   $("#dateIniEvent").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	   $("#dateEndEvent").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	   $("#dateIniInscr").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	   $("#dateEndInscr").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	});
</script>





<!-- <h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
 -->
