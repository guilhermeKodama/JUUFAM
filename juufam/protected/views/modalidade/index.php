<?php
/* @var $this ModalidadeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Modalidades',
);

$this->menu=array(
	array('label'=>'Criar Modalidades', 'url'=>array('create')),
	array('label'=>'Gerenciar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Modalidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
