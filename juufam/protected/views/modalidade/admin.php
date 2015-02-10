<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Modalidade', 'url'=>array('index')),
	array('label'=>'Create Modalidade', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#modalidade-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<<<<<<< HEAD
</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Gerenciar Modalidades</b></h1></div>
<hr>
=======
<h1>Manage Modalidades</h1>
>>>>>>> a9740aba41a132bf78d7e0ce4d5287dd837c7982

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'modalidade-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'itemsCssClass'=>"table table-striped",
	'columns'=>array(
		//'id',
		'nome',
		'tipo_modalidade',
		'min_inscr',
		'max_inscr',
		'genero',
		'max_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
