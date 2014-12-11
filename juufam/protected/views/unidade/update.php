<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Create Unidade', 'url'=>array('create')),
	array('label'=>'View Unidade', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>Update Unidade <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>