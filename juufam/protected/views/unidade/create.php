<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Unidades'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Campus', 'url'=>array('index')),
	array('label'=>'Gerenciar Campus', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Campus</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>