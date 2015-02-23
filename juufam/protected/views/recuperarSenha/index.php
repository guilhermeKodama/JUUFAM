<?php
/* @var $this SiteController */
/* @var $model RecuperarSenha */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Recuperar Senha';
$this->breadcrumbs=array(
	'Usuario',
);
?>
<a href="/juufam/juufam/index.php">Voltar</a><br/><br/>
<h1>Recuperar Senha</h1>

<p>
Se você esqueceu sua senha, siga as instruções para recuperá-la.
</p>
<form method="post" action="/juufam/juufam/index.php/RecuperarSenha/AlteraSenha ">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    
)); 
    $model = new RecuperarSenha;
?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">

                <?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

        <div class="row" id="email" >
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>  
          <div class="row" id="senha" >
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->passwordField($model,'senha'); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>  
	<div class="row buttons">
		<?php echo CHtml::submitButton('Modificar senha'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</form>
