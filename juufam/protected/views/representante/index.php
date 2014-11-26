<?php
/* @var $this RepresentanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuários',
);

$this->menu=array(
	array('label'=>'Criar Representante', 'url'=>array('create')),
	array('label'=>'Gerenciar Representante', 'url'=>array('admin')),
);
?>

<div id="box-form">
	<h1>Representantes</h1>

	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
