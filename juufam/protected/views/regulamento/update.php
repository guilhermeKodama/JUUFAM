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

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Editar Regulamento - </b><?php echo $model->ano; ?></div></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>