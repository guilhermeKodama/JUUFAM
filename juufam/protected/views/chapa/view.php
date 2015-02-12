<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Chapa', 'url'=>array('index')),
	array('label'=>'Criar Chapa', 'url'=>array('create')),
	array('label'=>'Atualizar Chapa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Chapa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Chapa', 'url'=>array('admin')),
);
?>

<h1>Visualizar Chapa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'id_evento',
		'id_unidade',
	),
)); ?>
