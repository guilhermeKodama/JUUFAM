<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Criar Atletas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#atleta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Gerenciar Atletas</b></h1></div>
<hr>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --></br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'atleta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'itemsCssClass'=>"table table-striped",
        'columns'=>array(
		'matricula',
		'cpf',
		'rg',
		'nome',
		'data_nasc',
		'genero',
		/*
		'tipo_atleta',
		'id_curso',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
