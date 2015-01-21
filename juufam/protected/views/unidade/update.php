<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Criar Unidade', 'url'=>array('create')),
	array('label'=>'Visualizar Unidade', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
);
?>

<h1>Update Unidade <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>