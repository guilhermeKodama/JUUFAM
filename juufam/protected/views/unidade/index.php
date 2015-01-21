<?php
/* @var $this UnidadeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidades',
);

$this->menu=array(
	array('label'=>'Criar Unidade', 'url'=>array('create')),
	array('label'=>'Gerenciar Unidades', 'url'=>array('admin')),
);
?>

<h1>Unidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
