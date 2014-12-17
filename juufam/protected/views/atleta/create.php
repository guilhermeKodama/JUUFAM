<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
);
?>

<h1>Create Atleta</h1>

<?php
if(isset($erro)){
	$this->renderPartial('_form', array('model'=>$model,'erro' => $erro));
}else{
	$this->renderPartial('_form', array('model'=>$model));
}

?>