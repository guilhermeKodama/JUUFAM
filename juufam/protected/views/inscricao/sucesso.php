<?php
/* @var $this CriarEventoController */
$this->breadcrumbs = array (
		'Inscricao' 
);
?>
<!-- import javascript -->
<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
?>
<h1>Inscrever atletas</h1>
<h1>Sucesso na inscrição</h1>
