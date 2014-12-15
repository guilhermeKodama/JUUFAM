<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Unidade', 'url'=>array('index')),
	array('label'=>'Create Unidade', 'url'=>array('create')),
	array('label'=>'Update Unidade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Unidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Unidade', 'url'=>array('admin')),
);
?>

<h1>View Unidade #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
	),
)); ?>
