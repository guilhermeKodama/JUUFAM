<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<!-- <div class="row">
		<?php// echo $form->label($model,'senha'); ?>
		<?php// echo $form->textField($model,'senha',array('size'=>45,'maxlength'=>45)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'id_tipo_usuario'); ?>
		<?php echo $form->textField($model,'id_tipo_usuario',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_chapa'); ?>
		<?php echo $form->textField($model,'id_chapa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->