<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Representantes', 'url'=>array('index')),
	array('label'=>'Criar Representantes', 'url'=>array('create')),
	array('label'=>'Visualizar Representante', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar representantes', 'url'=>array('admin')),
);
?>

<h1>Update Usuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>