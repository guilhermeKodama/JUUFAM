<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Modalidade', 'url'=>array('index')),
	array('label'=>'Criar Modalidade', 'url'=>array('create')),
	array('label'=>'Visualizar Modalidade', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir Modalidades', 'url'=>array('admin')),
);
?>
<div id="box-form">
	<h1>Atualizar Modalidade <?php echo $model->id; ?></h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>