<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->login=>array('view','id'=>$model->login),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Criar Usuario', 'url'=>array('create')),
	array('label'=>'Visualizar Usuario', 'url'=>array('view', 'id'=>$model->login)),
	array('label'=>'Gerenciar Usuarios', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Editar Usuário - </b><?php echo $model->login; ?></div></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>