<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Criar Unidades', 'url'=>array('create')),
	array('label'=>'Atualizar Unidades', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Unidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
);
?>

<h1>Visualizar Unidade #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'id_evento',
		'id_unidade',
	),
)); ?>
