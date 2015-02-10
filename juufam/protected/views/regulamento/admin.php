<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */

$this->breadcrumbs=array(
	'Regulamentos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Regulamento', 'url'=>array('index')),
	array('label'=>'Criar Regulamento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#regulamento-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Gerenciar Regulamentos</b></h1></div>
<hr>



<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'regulamento-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'itemsCssClass'=>"table table-striped",
	'columns'=>array(
		'ano',
		'link',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
