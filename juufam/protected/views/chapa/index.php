<?php
/* @var $this ChapaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chapas',
);

$this->menu=array(
	array('label'=>'Criar Chapa', 'url'=>array('create')),
	array('label'=>'Gerenciar Chapa', 'url'=>array('admin')),
);
?>

<h1>Chapas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
