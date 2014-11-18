<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Atleta', 'url'=>array('index')),
	array('label'=>'Create Atleta', 'url'=>array('create')),
	array('label'=>'View Atleta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Atleta', 'url'=>array('admin')),
);
?>

<h1>Update Atleta <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>