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

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

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
		<?php echo $form->passwordField($model,'senha',array('size'=>45,'maxlength'=>45)); ?>
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
		
		if (sizeof ( $models ) > 0) {
			print '<select name="Usuario[id_chapa]">';
			foreach ( $models as $model ) {
				print '<option  value="' . $model->id . '"> ' . $model->nome . '</option>';
			}
			print '</select>';
			
			echo '<div class="row buttons">';
			
			echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
			
			echo '</div>';
		}else{
			print "<h3>Não existe nenhuma chapa cadastrada</h3>";
		}
		
		?>

	<div class="row">
		<?php echo $form->labelEx($model,'Chapa'); ?>
		<?php echo $form->textField($model,'id_chapa'); ?>
		<?php echo $form->error($model,'id_chapa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
