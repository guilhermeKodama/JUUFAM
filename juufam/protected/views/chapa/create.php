<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
);
?>

<h1>Criar Unidades</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>