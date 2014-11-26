<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Representantes', 'url'=>array('index')),
	array('label'=>'Criar Representantes', 'url'=>array('create')),
	array('label'=>'Visualizar Representante', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar representantes', 'url'=>array('admin')),
);
?>

<div id="box-form">
	<h1>Atualizar Usuário <?php echo $model->id; ?></h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
