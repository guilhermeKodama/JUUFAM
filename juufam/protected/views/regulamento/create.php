<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */

$this->breadcrumbs=array(
	'Regulamentos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Regulamento', 'url'=>array('index')),
	array('label'=>'Editar Regulamento', 'url'=>array('admin')),
);
?>

<h1>Fazer upload de regulamentos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>