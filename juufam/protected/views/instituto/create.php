<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Institutos', 'url'=>array('index')),
	array('label'=>'Gerenciar Institutos', 'url'=>array('admin')),
);
?>

<h1>Create Instituto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>