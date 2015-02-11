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

<h1>Inscrever atletas</h1>
<p>Ocorreu um erro na inscrição de atletas</p>
<h1 class="erro"><?php echo $this->erro; ?></h1>
<h1>Volte <a href="<?php echo $baseUrl; ?>/index.php/Inscricao">aqui</a></h1>

