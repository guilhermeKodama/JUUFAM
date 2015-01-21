<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Institutos', 'url'=>array('index')),
	array('label'=>'Criar Instituto', 'url'=>array('create')),
	array('label'=>'Visualizar Instituto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Institutos', 'url'=>array('admin')),
);
?>

<h1>Update Instituto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>