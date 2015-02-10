<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->login,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Criar Usuario', 'url'=>array('create')),
	array('label'=>'Editar Usuario', 'url'=>array('update', 'id'=>$model->login)),
	array('label'=>'Deletar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->login),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Usuarios', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Visualizar Usuário - </b><?php echo $model->login; ?></h1></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nome',
		'login',
		'senha',
		'id_tipo_usuario',
		'id_chapa',
	),
)); ?>
