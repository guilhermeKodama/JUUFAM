<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Campus', 'url'=>array('index')),
	array('label'=>'Criar Campus', 'url'=>array('create')),
	array('label'=>'Visualizar Campus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Campus', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Editar Campus - </b><?php echo $model->nome; ?></div></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>