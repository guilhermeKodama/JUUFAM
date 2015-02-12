<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Chapas', 'url'=>array('index')),
	array('label'=>'Gerenciar Chapas', 'url'=>array('admin')),
);
?>

<h1>Criar Chapa</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>