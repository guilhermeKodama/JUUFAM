<?php
/* @var $this RepresentanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Criar Representante', 'url'=>array('create')),
	array('label'=>'Gerenciar Representante', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
