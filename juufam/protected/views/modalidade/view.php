<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */

$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Modalidade', 'url'=>array('index')),
	array('label'=>'Criar Modalidade', 'url'=>array('create')),
	array('label'=>'Atualizar Modalidade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Modalidade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Modalidade', 'url'=>array('admin')),
);
?>

</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Visualizar Modalidade - </b><?php echo $model->nome; ?></h1></div>
<hr> 

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    	'attributes'=>array(
		'id',
		'nome',
		'tipo_modalidade',
		'min_inscr',
		'max_inscr',
		'genero',
		'max_time',
	),
)); ?>
