<?php
/* @var $this ChapaController */
/* @var $model Chapa */

$this->breadcrumbs=array(
	'Chapas'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Chapas', 'url'=>array('index')),
	array('label'=>'Criar Chapa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#chapa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Chapas</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'chapa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nome',
		'id_evento',
		'id_unidade',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
