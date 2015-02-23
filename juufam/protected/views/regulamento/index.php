<?php
/* @var $this RegulamentoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regulamentos',
);

$this->menu=array(
	//array('label'=>'Fazer upload de regulamentos', 'url'=>array('create')),
	//array('label'=>'Editar regulamentos existentes', 'url'=>array('admin')),
);
?>

<h1>Regulamentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
