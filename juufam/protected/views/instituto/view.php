<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Instituto', 'url'=>array('index')),
	array('label'=>'Create Instituto', 'url'=>array('create')),
	array('label'=>'Update Instituto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instituto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instituto', 'url'=>array('admin')),
);
?>

<h1>View Instituto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'id_uni',
	),
)); ?>
