<?php
/* @var $this ChapaController */
/* @var $data Chapa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evento')); ?>:</b>
	<?php echo CHtml::encode($data->id_evento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidade')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidade); ?>
	<br />


</div>