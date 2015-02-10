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

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Curso</b></h1></div>
<hr>

<?php
if(isset($erro)){
	$this->renderPartial('_form', array('model'=>$model,'erro' => $erro));
}else{
	$this->renderPartial('_form', array('model'=>$model));
}

?>