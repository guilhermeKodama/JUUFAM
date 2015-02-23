<?php
/* @var $this InstitutoController */
/* @var $model Instituto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instituto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textArea($model,'nome',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
	
	<?php 
	
	/*LISTAR AS UNIDADES*/
	
	$controller = new UnidadeController ( 'unidade' );
	$models = $controller->getAllUnidades();
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		echo '<label  class="required"> Unidade <span class="required">*</span></label></br>';
		print '<select name="Instituto[id_uni]">';
		foreach ( $models as $m ) {
			print '<option  value="' . $m->id . '"> ' . $m->nome . '</option>';
		}
		print '</select>';
		echo $form->error ( $m, 'id_uni' );
		echo '</div>';
	
		$hasUnidade = true;
	
	} else {
		echo '<div class="row">';
		print "<h4>Não existe nenhuma unidade cadastrada ,por favor insira uma para prosseguir</h4>";
		echo '</div>';
	}
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->