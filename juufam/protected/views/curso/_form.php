<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$hasInstituto = false;
$hasUnidade = false;

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'curso-form',
		
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
		<?php if(isset($erro)){echo '<font size="2" color="red">'.$erro.'</font></br>';}?>
		<?php echo $form->labelEx($model,'Codigo do curso *'); ?>
		<?php echo $form->textField($model,'id',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'id'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>


	
	<?php
	/* LISTAR OS INSTITUTOS */
	
	$controller = new InstitutoController ( 'instituto' );
	$models = $controller->getAllInstitutos ();
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		echo '<label  class="required"> Instituto <span class="required">*</span></label></br>';
		print '<select name="Curso[id_instituto]">';
		foreach ( $models as $m ) {
			print '<option  value="' . $m->id . '"> ' . $m->nome . '</option>';
		}
		print '</select>';
		echo $form->error ( $m, 'id_instituto' );
		echo '</div>';
		
		$hasInstituto = true;
		
	} else {
		echo '<div class="row">';
		print "<h4>Não existe nenhum instituto cadastrada ,por favor insira uma para prosseguir</h4>";
		echo '</div>';
	}
	
	
	
	/*LISTAR AS UNIDADES*/
	
	$controller = new UnidadeController ( 'unidade' );
	$models = $controller->getAllUnidades();
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		echo '<label  class="required"> Unidade <span class="required">*</span></label></br>';
		print '<select name="Curso[id_unidade]">';
		foreach ( $models as $m ) {
			print '<option  value="' . $m->id . '"> ' . $m->nome . '</option>';
		}
		print '</select>';
		echo $form->error ( $m, 'id_unidade' );
		echo '</div>';
		
		$hasUnidade = true;
	
	} else {
		echo '<div class="row">';
		print "<h4>Não existe nenhuma unidade cadastrada ,por favor insira uma para prosseguir</h4>";
		echo '</div>';
	}
	
	/*verifica se tem instituto e unidade cadastrado se não nem mostrar o botão de criar*/
	if($hasInstituto && $hasUnidade){
		print '<div class="row buttons">';
			echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
		print '</div>';
	}
	
	
	?>
	
	



	

<?php $this->endWidget(); ?>

</div>
<!-- form -->