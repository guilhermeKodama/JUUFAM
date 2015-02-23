<?php
/* @var $this RepresentanteController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_chapa')); ?>:</b>
	<?php echo CHtml::encode($data->id_chapa); ?>
	<br />


</div>