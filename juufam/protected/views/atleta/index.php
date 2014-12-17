<?php
/* @var $this AtletaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Atletas',
);

$this->menu=array(
	array('label'=>'Criar Atletas', 'url'=>array('create')),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
);
?>

<h1>Atletas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
