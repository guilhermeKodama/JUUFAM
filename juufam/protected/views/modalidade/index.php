<?php
/* @var $this ModalidadeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Modalidades',
);

$this->menu=array(
	array('label'=>'Create Modalidade', 'url'=>array('create')),
	array('label'=>'Manage Modalidade', 'url'=>array('admin')),
);
?>

<h1>Modalidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
