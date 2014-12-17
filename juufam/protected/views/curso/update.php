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
	array('label'=>'CriarCurso', 'url'=>array('create')),
	array('label'=>'Visualizar Curso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Cursos', 'url'=>array('admin')),
);
?>

<h1>Update Curso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>