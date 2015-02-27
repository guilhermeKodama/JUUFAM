<?php
/* @var $this InstitutoController */
/* @var $model Instituto */

$this->breadcrumbs=array(
	'Institutos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Institutos', 'url'=>array('index')),
	array('label'=>'Criar Instituto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#instituto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Gerenciar Institutos</b></h1></div>
<hr>



<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
    
</div><!-- search-form --></br>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'instituto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'itemsCssClass'=>"table table-striped",
	'columns'=>array(
		'id',
		'nome',
		'id_uni',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
