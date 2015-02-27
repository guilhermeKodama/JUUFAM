<?php
/* @var $this UnidadeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Campus',
);

$this->menu=array(
	array('label'=>'Criar Campus', 'url'=>array('create')),
	array('label'=>'Gerenciar Campus', 'url'=>array('admin')),
);
?>

<h1>Unidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
