<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Gerenciar Modalidades', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Modalidades</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>