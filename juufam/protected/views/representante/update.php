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

<h1>Update Usuario <?php echo $model->login; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>