<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Modalidade', 'url'=>array('index')),
	array('label'=>'Manage Modalidade', 'url'=>array('admin')),
);
?>

<h1>Create Modalidade</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>