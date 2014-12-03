<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Gerenciar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Create Modalidade</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>