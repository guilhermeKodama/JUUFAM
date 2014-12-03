<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Criar Atleta', 'url'=>array('create')),
	array('label'=>'Atualizar Atleta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Atleta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
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
