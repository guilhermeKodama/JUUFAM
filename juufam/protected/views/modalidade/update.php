<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Criar Modalidades', 'url'=>array('create')),
	array('label'=>'Visualizar Modalidade', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Update Modalidade <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>