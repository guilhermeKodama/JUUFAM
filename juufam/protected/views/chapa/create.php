<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chapa', 'url'=>array('index')),
	array('label'=>'Manage Chapa', 'url'=>array('admin')),
);
?>

<h1>Create Chapa</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>