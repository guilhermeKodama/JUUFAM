<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Campus'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Institutos', 'url'=>array('index')),
	array('label'=>'Gerenciar Institutos', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Cadastrar Instituto</b></h1></div>
<hr>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>