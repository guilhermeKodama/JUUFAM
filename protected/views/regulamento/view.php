<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */

$this->breadcrumbs=array(
	'Regulamentos'=>array('index'),
	$model->ano,
);

$this->menu=array(
	array('label'=>'Lista de Regulamentos', 'url'=>array('index')),
	array('label'=>'Criar Regulamento', 'url'=>array('create')),
	array('label'=>'Atualizar Regulamento', 'url'=>array('update', 'id'=>$model->ano)),
	array('label'=>'Excluir Regulamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ano),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Editar Regulamento', 'url'=>array('admin')),
);
?>

<h1>Regulamento de <?php echo $model->ano; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ano',
		'link',
	),
)); ?>
