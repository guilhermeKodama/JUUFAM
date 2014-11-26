<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gerenciamento',
);

$this->menu=array(
	array('label'=>'Listar Representante', 'url'=>array('index')),
	array('label'=>'Criar Representante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="box-form">
	<h1>Gerenciar Usuários</h1>

	<?php echo CHtml::link('Pesquisa avançada','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'usuario-grid',
		'dataProvider'=>$model->search(),
		'columns'=>array(
			'id',
			'nome',
			'login',
			'id_tipo_usuario',
			'id_chapa',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>

</div>
