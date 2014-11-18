<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Modalidade', 'url'=>array('index')),
	array('label'=>'Create Modalidade', 'url'=>array('create')),
	array('label'=>'View Modalidade', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Modalidade', 'url'=>array('admin')),
);
?>

<h1>Update Modalidade <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>