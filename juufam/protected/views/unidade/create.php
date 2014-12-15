<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Create Unidade</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>