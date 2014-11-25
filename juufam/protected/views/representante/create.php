<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Representante', 'url'=>array('index')),
	array('label'=>'Gerenciar Representante', 'url'=>array('admin')),
);
?>

<h1>Create Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>