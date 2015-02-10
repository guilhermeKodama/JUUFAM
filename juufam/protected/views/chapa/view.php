<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Chapa', 'url'=>array('index')),
	array('label'=>'Create Chapa', 'url'=>array('create')),
	array('label'=>'Update Chapa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Chapa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chapa', 'url'=>array('admin')),
);
?>

<h1>View Chapa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'id_evento',
		'id_unidade',
	),
)); ?>
