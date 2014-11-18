<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Atleta', 'url'=>array('index')),
	array('label'=>'Manage Atleta', 'url'=>array('admin')),
);
?>

<h1>Create Atleta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>