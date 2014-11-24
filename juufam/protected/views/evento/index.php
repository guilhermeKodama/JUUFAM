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
?>




<h1>Criar nova Edicão</h1>

<form enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Evento/Create'?>">
	<div>
		<input type="text" name="nameEvent" placeholder="Nome da edicão">
	</div>
	<div>
		<input id="dateIniEvent" name="dateIniEvent" type="text"
			placeholder="Data inicio evento"> <input id="dateEndEvent"
			name="dateEndEvent" type="text" placeholder="Data fim evento">
	</div>
	<div>
		<input id="dateIniInscr" name="dateIniInscr" type="text"
			placeholder="Data inicio inscricão"> <input id="dateEndInscr"
			name="dateEndInscr" type="text" placeholder="Data fim inscricão">
	</div>
	<div>
		<h3>Modelo do certificado</h3>
		<input type="file" id="userfile" name="userfile"
			accept="application/pdf">
	</div>

	<div>

		<h3>Selecione as modalidades que estarão nesta edicão do evento</h3>
	<?php
	/* Mostrar os eventos */
	$mEventoController = new ModalidadeController ( 'modalidade' );
	$models = $mEventoController->getAllModality ();
	
	foreach ( $models as $model ) {
		echo '<input type="checkbox"  name="modalidades[]" value="' . $model->id . '">'.$model->nome.' '.$model->tipo_modalidade.' '.$model->genero.'<br>';
	}
	
	?>
	</div>
	<div>
		<button type="submit">Finalizar</button>
	</div>
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
