<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'modalidade-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false 
) );
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<label for="Modalidade_tipo_modalidade" class="required"> Tipo
			Modalidade <span class="required">*</span>
		</label> <br /> <select name="Modalidade[tipo_modalidade]">
			<option value="coletivo">Coletivo</option>
			<option value="individual">Individual</option>
		</select>
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
		<label for="Modalidade_genero" class="required"> Genero <span
			class="required">*</span>
		</label> <br /> <select name="Modalidade[genero]">
			<option value="masculino">Masculino</option>
			<option value="feminino">Feminino</option>
		</select>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_time'); ?>
		<?php echo $form->textField($model,'max_time'); ?>
		<?php echo $form->error($model,'max_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->