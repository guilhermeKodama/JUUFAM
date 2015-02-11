<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instituto')); ?>:</b>
	<?php echo CHtml::encode($data->id_instituto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidade')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidade); ?>
	<br />


</div>