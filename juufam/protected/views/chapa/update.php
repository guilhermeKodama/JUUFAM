<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chapa', 'url'=>array('index')),
	array('label'=>'Create Chapa', 'url'=>array('create')),
	array('label'=>'View Chapa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Chapa', 'url'=>array('admin')),
);
?>

<h1>Update Chapa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'relations'=>$relations)); ?>