<?php
/* @var $this UnidadeController */
/* @var $model Unidade */

$this->breadcrumbs=array(
	'Campus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Campus', 'url'=>array('index')),
	array('label'=>'Criar Campus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#unidade-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Gerenciar Campus</b></h1></div>
<hr>


<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> </br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidade-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'itemsCssClass'=>"table table-striped",
	'columns'=>array(
		'id',
		'nome',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
