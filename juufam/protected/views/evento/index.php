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

<form method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Evento/Create'?>">
	<div>
		<input type="text" name="nameEvent" placeholder="Nome da edicão">
	</div>
	<div>
		<input id="dateIniEvent" name="dateIniEvent" type="text" placeholder="Data inicio evento">
		<input id="dateEndEvent" name="dateEndEvent" type="text" placeholder="Data fim evento">
	</div>
	<div>
		<input id="dateIniInscr" name="dateIniInscr" type="text" placeholder="Data inicio inscricão">
		<input id="dateEndInscr" name="dateEndInscr" type="text" placeholder="Data fim inscricão">
	</div>
	<div>
		<button>Carregar novo modelo de certificado</button>
	</div>
	<div>
		<button type="submit">Finalizar</button>
	</div>
</form>




<script type="text/javascript">
jQuery(function($){
	   $("#dateIniEvent").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	   $("#dateEndEvent").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	   $("#dateIniInscr").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	   $("#dateEndInscr").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
	});
</script>





<!-- <h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
 -->
