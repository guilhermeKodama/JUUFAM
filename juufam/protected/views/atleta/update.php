<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->cpf=>array('view','id'=>$model->cpf),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Criar Atletas', 'url'=>array('create')),
	array('label'=>'Visualizar Atleta', 'url'=>array('view', 'id'=>$model->cpf)),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
);
?>

<h1>Update Atleta <?php echo $model->cpf; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>