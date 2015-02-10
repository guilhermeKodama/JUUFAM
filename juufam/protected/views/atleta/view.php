<?php
/* @var $this AtletaController */
/* @var $model Atleta */

$this->breadcrumbs=array(
	'Atletas'=>array('index'),
	$model->cpf,
);

$this->menu=array(
	array('label'=>'Listar Atletas', 'url'=>array('index')),
	array('label'=>'Criar Atleta', 'url'=>array('create')),
	array('label'=>'Editar Atleta', 'url'=>array('update', 'id'=>$model->cpf)),
	array('label'=>'Deletar Atleta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cpf),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Atletas', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Visualizar Atleta - </b><?php echo $model->nome; ?></div></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'matricula',
		'cpf',
		'rg',
		'nome',
		'data_nasc',
		'genero',
		'tipo_atleta',
		'id_curso',
	),
)); ?>
