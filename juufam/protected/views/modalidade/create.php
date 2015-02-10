<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Modalidade', 'url'=>array('index')),
	array('label'=>'Manage Modalidade', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Modalidades</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>