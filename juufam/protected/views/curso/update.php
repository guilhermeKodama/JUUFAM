<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Cursos', 'url'=>array('index')),
	array('label'=>'Criar Curso', 'url'=>array('create')),
	array('label'=>'Visualizar Curso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Cursos', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Editar Curso - </b><?php echo $model->nome; ?></div></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>