<?php
/* @var $this ChapaController */
/* @var $model Chapa */
/* @var $form CActiveForm */


?>

<div class="form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'chapa-form',
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
	<?php
	$currentEvent = EventoController::getCurrentEventOpen ();
	print '<input name="Chapa[id_evento]" id="Chapa_id_evento" type="hidden" value="' . $currentEvent->id . '">';
	?>
	</div>
	<div class="row">
		<label>Unidade</label>
	<?php
	$controller = new UnidadeController ( 'unidade' );
	$models = $controller->getAllUnidades ();
	/* Lista as chapas para serem vinculadas ao novo representante */
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		print '<select  name="Chapa[id_unidade]">';
		foreach ( $models as $model ) {
			print '<option  value="' . $model->id . '"> ' . $model->nome . '</option>';
		}
		print '</select>';
	}
	
	?>
	</div>
	<div class="row">
		<!-- TABLE CURSOS -->
		<label>Cursos da Chapa</label>
		<table class="table table-bordered table-hover" id="tab_logic">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				$controller = new CursoController ( 'chapa' );
				$models = $controller->getAllCursos ();
				if (sizeof ( $relations ) != 0) {
					
					foreach ( $relations as $relation ) {
						$curso = Curso::model ()->findByPk ( $relation->id_curso );
						print "<tr id='addr" . ($i - 1) . "'>";
						print "<td >" . $i . "</td>";
						print "<td>";
						
						/* Coloca o dropbox para escolher os cursos */
						
						if (sizeof ( $models ) > 0) {
							echo '<div class="row">';
							print '<select id="select_curso" name="cursos[0]">';
							print '<option  value="' . $relation->id_curso . '"> ' . $curso->nome . '</option>';
							foreach ( $models as $model ) {
								if ($model->id != $relation->id_curso) {
									print '<option  value="' . $model->id . '"> ' . $model->nome . '</option>';
								}
							}
							print '</select>';
						}
						
						print "</td>";
						print "</tr>";
						$i ++;
					}
					print "<tr id='addr" . ($i - 1) . "'>";
					print "<input type='hidden' id='size' value='" . ($i - 1) . "'>";
				} else {
					
					print "<tr id='addr" . ($i - 1) . "'>";
					print "<td >" . $i . "</td>";
					print "<td>";
					print '<select id="select_curso" name="cursos[0]">';
					foreach ( $models as $model ) {
						
						print '<option  value="' . $model->id . '"> ' . $model->nome . '</option>';
					}
					print '</select>';
					
					print "</td>";
					print "</tr>";
					$i ++;
					
					print "<tr id='addr" . ($i - 1) . "'>";
					print "<input type='hidden' id='size' value='" . ($i - 1) . "'>";
				}
				
				?>
				<tr id='addr1'></tr>
			</tbody>
		</table>

		<a id="add_row" class="btn btn-default pull-left">Adicionar</a><a
			id='delete_row' class="pull-right btn btn-default">Deletar</a>
	</div>

	<!-- END TABLE CURSOS -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<script type="text/javascript">
$(document).ready(function(){
    var i = parseInt(document.getElementById('size').value,10);
   $("#add_row").click(function(){
    $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name=\"cursos["+i+"]\">"+$("#select_curso").html()+"</select></td></td>");

    $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
    i++; 
});
   $("#delete_row").click(function(){
  	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
</script>

<?php $this->endWidget(); ?>



</div>
<!-- form -->