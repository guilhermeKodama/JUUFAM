<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instituto', 'url'=>array('index')),
	array('label'=>'Manage Instituto', 'url'=>array('admin')),
);
?>

<h1>Create Instituto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>