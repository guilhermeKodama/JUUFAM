<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Modalidade', 'url'=>array('index')),
	array('label'=>'Gerir Modalidade', 'url'=>array('admin')),
);
?>

<div id="box-form">
	<h1>Criar Modalidade</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>