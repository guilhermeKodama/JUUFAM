<?php
/* @var $this ModalidadeController */
/* @var $data Modalidade */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_modalidade')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_modalidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_inscr')); ?>:</b>
	<?php echo CHtml::encode($data->min_inscr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_inscr')); ?>:</b>
	<?php echo CHtml::encode($data->max_inscr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genero')); ?>:</b>
	<?php echo CHtml::encode($data->genero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_time')); ?>:</b>
	<?php echo CHtml::encode($data->max_time); ?>
	<br />


</div>