<?php
/* @var $this RepresentanteController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'usuario-form',
		
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
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->textField($model,'senha',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>

	<div class="row" id="gone_type">
		<?php echo $form->labelEx($model,'id_tipo_usuario'); ?>
		<?php echo $form->textField($model,'id_tipo_usuario',array('size'=>13,'maxlength'=>13,'value'=>'representante')); ?>
		<?php echo $form->error($model,'id_tipo_usuario'); ?>
	</div>

	<script type="text/javascript">
	document.getElementById("gone_type").style.display="none";
	</script>
	<!-- <input name="Usuario[id_chapa]" id="Usuario_id_chapa" type="text"> -->
	<?php
	$controller = new ChapaController ( 'chapa' );
	$models = $controller->getAllChapas ();
	
	/* Lista as chapas para serem vinculadas ao novo representante */
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		echo '<label  class="required"> Chapa do representante <span class="required">*</span></label>';
		print '<select name="Usuario[id_chapa]">';
		foreach ( $models as $model ) {
			print '<option  value="' . $model->id . '"> ' . $model->nome . '</option>';
		}
		print '</select>';
		echo '</div>';
		
		echo '<div class="row buttons">';
		
		echo CHtml::submitButton ( $model->isNewRecord ? 'Create' : 'Save' );
		
		echo '</div>';
	} else {
		echo '<div class="row buttons">';
		print "<h3>Não existe nenhuma chapa cadastrada</h3>";
		echo '</div>';
	}
	
	?>

<?php $this->endWidget(); ?>

</div>
<!-- form -->