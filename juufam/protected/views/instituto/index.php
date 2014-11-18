<?php
/* @var $this InstitutoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institutos',
);

$this->menu=array(
	array('label'=>'Create Instituto', 'url'=>array('create')),
	array('label'=>'Manage Instituto', 'url'=>array('admin')),
);
?>

<h1>Institutos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
