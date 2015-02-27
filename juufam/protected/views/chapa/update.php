<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Unidades', 'url'=>array('index')),
	array('label'=>'Criar Unidades', 'url'=>array('create')),
	array('label'=>'Visualizar Unidades', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
);
?>

<h1>Atualizar Unidade <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>