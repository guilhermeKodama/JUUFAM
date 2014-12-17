<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Cursos', 'url'=>array('index')),
	array('label'=>'Criar Curso', 'url'=>array('create')),
	array('label'=>'Editar Curso', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Cursos', 'url'=>array('admin')),
);
?>

<h1>View Curso #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'id_instituto',
		'id_unidade',
	),
)); ?>
