<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Representante', 'url'=>array('index')),
	array('label'=>'Gerenciar Representante', 'url'=>array('admin')),
);
?>

<div id="box-form">
	<h1>Criar Representante</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
