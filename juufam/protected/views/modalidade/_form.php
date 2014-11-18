<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modalidade-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_modalidade'); ?>
		<?php echo $form->textField($model,'tipo_modalidade',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipo_modalidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_inscr'); ?>
		<?php echo $form->textField($model,'min_inscr'); ?>
		<?php echo $form->error($model,'min_inscr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_inscr'); ?>
		<?php echo $form->textField($model,'max_inscr'); ?>
		<?php echo $form->error($model,'max_inscr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genero'); ?>
		<?php echo $form->textField($model,'genero',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'genero'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->