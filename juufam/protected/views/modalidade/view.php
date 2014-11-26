<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Modalidade', 'url'=>array('index')),
	array('label'=>'Criar Modalidade', 'url'=>array('create')),
	array('label'=>'Atualizar Modalidade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Modalidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir Modalidades', 'url'=>array('admin')),
);
?>

<h1>Visualizar Modalidade #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'tipo_modalidade',
		'min_inscr',
		'max_inscr',
		'genero',
	),
)); ?>
