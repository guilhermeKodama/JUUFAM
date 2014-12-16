<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instituto', 'url'=>array('index')),
	array('label'=>'Create Instituto', 'url'=>array('create')),
	array('label'=>'View Instituto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instituto', 'url'=>array('admin')),
);
?>

<h1>Update Instituto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>