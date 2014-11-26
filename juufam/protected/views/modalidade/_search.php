<?php
/* @var $this ModalidadeController */
/* @var $model Modalidade */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_modalidade'); ?>
		<?php echo $form->textField($model,'tipo_modalidade',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mínimo Inscritos'); ?>
		<?php echo $form->textField($model,'min_inscr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Máximo Inscritos'); ?>
		<?php echo $form->textField($model,'max_inscr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gênero'); ?>
		<?php echo $form->textField($model,'genero',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->