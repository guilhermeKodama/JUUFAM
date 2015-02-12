<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Chapas', 'url'=>array('index')),
	array('label'=>'Criar Chapa', 'url'=>array('create')),
	array('label'=>'Visualizar Chapa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Chapas', 'url'=>array('admin')),
);
?>

<h1>Atualizar Chapa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>