<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Cursos', 'url'=>array('index')),
	array('label'=>'Gerenciar Curso', 'url'=>array('admin')),
);
?>

<h1>Create Curso</h1>

<?php
if(isset($erro)){
	$this->renderPartial('_form', array('model'=>$model,'erro' => $erro));
}else{
	$this->renderPartial('_form', array('model'=>$model));
}

?>