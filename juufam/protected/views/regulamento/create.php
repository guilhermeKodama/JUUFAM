<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */

$this->breadcrumbs=array(
	'Regulamentos'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Regulamento', 'url'=>array('index')),
	array('label'=>'Editar Regulamento', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Fazer Upload de Regulamentos</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>