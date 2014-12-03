<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Criar Atleta', 'url'=>array('create')),
	array('label'=>'Visualizar Atleta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
);
?>

<h1>Update Atleta <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>