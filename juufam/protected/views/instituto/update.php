<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Campus'=>array('index'),
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

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Editar Instituto - </b><?php echo $model->nome; ?></div></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>