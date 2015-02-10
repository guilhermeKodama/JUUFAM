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

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Atleta</b></h1></div>
<hr>

<?php
if(isset($erro)){
	$this->renderPartial('_form', array('model'=>$model,'erro' => $erro));
}else{
	$this->renderPartial('_form', array('model'=>$model));
}

?>