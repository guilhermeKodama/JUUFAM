<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Representante', 'url'=>array('index')),
	array('label'=>'Criar Representante', 'url'=>array('create')),
	array('label'=>'Atualizar Representante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir Representante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Representantes', 'url'=>array('admin')),
);
?>

<h1>View Usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'login',
		'senha',
		'id_tipo_usuario',
		'id_chapa',
	),
)); ?>
