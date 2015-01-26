<?php
/* @var $this RegulamentoController */
/* @var $model Regulamento */
/* @var $form CActiveForm */
?>
<form action="" method="post" enctype="multipart/form-data" > 
<div class="form">  
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model,'ano'); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>
        
        <div class="uploadform"> 
            <input type="file" id="arquivoRegulamento" name="arquivoRegulamento"
			accept="application/pdf" /> 
           
           
        </div> 
       
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div> 
</form>