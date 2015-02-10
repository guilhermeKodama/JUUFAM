<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="login">
	</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Login</b></h1></div>
<hr>

	<p>Insira as informações abaixo para entrar no sistema:</p>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'Login: '); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'Senha: '); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Entrar'); ?>
		</div>
                <div class="row">
                        <?php
                         echo "<a href= 'http://localhost/juufam/index.php?r=RecuperarSenha'>  Esqueci minha senha  </a>"
                        ?>
                    
                </div>


	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>