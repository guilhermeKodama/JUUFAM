<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Atleta', 'url'=>array('index')),
	array('label'=>'Create Atleta', 'url'=>array('create')),
	array('label'=>'Update Atleta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Atleta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Atleta', 'url'=>array('admin')),
);
?>

<h1>View Atleta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'matricula',
		'cpf',
		'rg',
		'nome',
		'data_nasc',
		'genero',
		'id',
		'tipo_atleta',
		'id_curso',
	),
)); ?>
