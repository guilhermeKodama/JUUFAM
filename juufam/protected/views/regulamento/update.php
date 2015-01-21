<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */

$this->breadcrumbs=array(
	'Regulamentos'=>array('index'),
	$model->ano=>array('view','id'=>$model->ano),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Regulamentos', 'url'=>array('index')),
	array('label'=>'Criar Regulamento', 'url'=>array('create')),
	array('label'=>'Visualizar Regulamento', 'url'=>array('view', 'id'=>$model->ano)),
	array('label'=>'Editar Regulamento', 'url'=>array('admin')),
);
?>

<h1>Atualizar Regulamento <?php echo $model->ano; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>