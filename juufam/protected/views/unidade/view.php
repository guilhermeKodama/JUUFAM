<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Unidade', 'url'=>array('index')),
	array('label'=>'CriarUnidade', 'url'=>array('create')),
	array('label'=>'Editar Unidade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Unidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
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
