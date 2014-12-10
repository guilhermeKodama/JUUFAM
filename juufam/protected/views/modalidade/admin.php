<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Criar Modalidades', 'url'=>array('create')),
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

<h1>Gerenciar Modalidades</h1>


<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'modalidade-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nome',
		'tipo_modalidade',
		'min_inscr',
		'max_inscr',
		'genero',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
