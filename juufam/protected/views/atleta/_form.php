<?php
/* @var $this AtletaController */
/* @var $model Atleta */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
function verificaCPF(str) {
    var Soma,
    	Resto;

    Soma = 0;
	if (str == "00000000000") return false;
    
	for (i=1; i<=9; i++) Soma = Soma + parseInt(str.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(str.substring(9, 10)) ) return false;
	
	Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(str.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(str.substring(10, 11))) return false;
    return true;
}

</script>

<div class="form">


	<!-- import javascript -->
<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
?>

<?php
$form = $this->beginWidget ('CActiveForm', array (
		'id' => 'atleta-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data' 
		) 
));
?>

	<p class="note">
		Campos com <span class="required">*</span> são obrigatórios.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php if(isset($erro["cpf"])){echo '<font size="2" color="red">'.$erro["cpf"].'</font></br>';}?>
		<?php echo $form->labelEx($model,'cpf'); ?>
		<?php echo $form->textField($model,'cpf',array('size'=>14,'maxlength'=>14,'id'=>'cpf')); ?>
		<?php echo $form->error($model,'cpf'); ?>
	</div>
	<span id="import-ws">Importar dados</span>

	<div class="row">
		<?php if(isset($erro["matricula"])){echo '<font size="2" color="red">'.$erro["matricula"].'</font></br>';}?>
		<?php echo $form->labelEx($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>8,'maxlength'=>8, 'readonly' => true)); ?>
		<?php echo $form->error($model,'matricula'); ?>
	</div>

	<script type="text/javascript">

		var url = "<?php echo Yii::app()->getBaseUrl(true).'/index.php/atleta/import'; ?>" + "?cpf=";

		jQuery(function($){
	   		$("#cpf").mask("999.999.999-99",{ placeholder:"" });

	   		$("#import-ws").click(function() {
	   			var first = this,
	   				cpfUser = $("#cpf").val();

	   			cpfUser = cpfUser.replace(".", "").replace("-","").replace(".", "");

	   			if (verificaCPF(cpfUser)) {
		   			urlparam = url + cpfUser;

		   			$(this).css('background-color', '#A5C6DE');
	   				$(this).text("Carregando...");

					$.get(urlparam, function(user) {
						if (user.status == "true") {
							for (var i = 0; i < user.response.length; i++) {
								$("#Atleta_nome").val(user.response[i].nome);
								$("#Atleta_matricula").val(user.response[i].matricula);
								$("#dataNasc").val(user.response[i].nascimento);
								$("#genero").val(user.response[i].sexo);
								$("#selectOpt").val(user.response[i].tipo);
								$("#curso").val(user.response[i].curso);
								$(first).text("Importado");
								$(first).css('background-color', 'green');
								$(first).css('color', 'white');
							}
						} else {

							$("#Atleta_nome").val("");
							$("#Atleta_matricula").val("");
							$("#dataNasc").val("");
							$("#curso").val("");

							$(first).text("Erro");
							$(first).css('background-color', 'red');
							$(first).css('color', 'white');
						}
					});  		
				} else {
					alert("CPF Inválido");
				}
	   		});
		});
	</script>

	<div class="row">
		<?php if(isset($erro["rg"])){echo '<font size="2" color="red">'.$erro["rg"].'</font></br>';}?>
		<?php echo $form->labelEx($model,'rg'); ?>
		<?php echo $form->textField($model,'rg',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rg'); ?>
	</div>

	<div class="row">
		<?php if(isset($erro["nome"])){echo '<font size="2" color="red">'.$erro["nome"].'</font></br>';}?>
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>45,'maxlength'=>45, 'readonly' => true)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php if(isset($erro["data_nasc"])){echo '<font size="2" color="red">'.$erro["data_nasc"].'</font></br>';}?>
		<?php echo $form->labelEx($model,'data_nasc'); ?>
		<?php echo $form->textField($model,'data_nasc',array('size'=>45,'maxlength'=>45,'id'=>'dataNasc', 'readonly' => true)); ?>
		<?php echo $form->error($model,'data_nasc'); ?>
	</div>

	<script type="text/javascript">
		jQuery(function($){
	   	$("#dataNasc").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
		});
	</script>

	<div class="row">
		<label for="Atleta_genero" class="required"> Gênero <span
			class="required">*</span>
		</label> <br /> <select id="genero" name="Atleta[genero]" readonly="true">
			<option value="masculino">Masculino</option>
			<option value="feminino">Feminino</option>
		</select>
		<?php echo $form->error($model,'genero'); ?>
	</div>

	<script type="text/javascript">
		function loadPDF(){
			var myselect = document.getElementById("selectOpt");
		  
			if (myselect.options[myselect.selectedIndex].value == "egresso") {
				document.getElementById("loadFile").style.display = 'block';
			} else {				
				document.getElementById("loadFile").style.display = 'none';
			}
		}
	</script>


	<div class="row">
		<label for="Atleta_tipo_atleta" class="required"> Tipo de Atleta <span class="required">*</span>
		</label> <br /> <select name="Atleta[tipo_atleta]" id="selectOpt" onChange="loadPDF()" readonly="true">
			<option value="ativo">Ativo</option>
			<option value="funcionario">Funcionario</option>
			<option value="egresso">Egresso</option>
		</select>
		<?php echo $form->error($model,'tipo_atleta'); ?>
	</div>

	<div class="row" id="loadFile" style="display:none">
		<h3>Documentos de comprovação</h3>
		<?php if(isset($erro["file"])){echo '<font size="2" color="red">'.$erro["file"].'</font></br>';}?>
		<input type="file" id="userfile" name="userfile"
			accept="application/pdf">
	</div>
	

	<?php
	$controller = new CursoController ( 'chapa' );
	$models = $controller->getAllCursos ();
	
	/* Lista as chapas para serem vinculadas ao novo representante */
	
	if (sizeof ( $models ) > 0) {
		echo '<div class="row">';
		echo '<label class="required"> Curso do Atleta <span class="required">*</span></label>';
		print '<select id="curso" name="Atleta[id_curso]">';
		foreach ($models as $model) {
			print '<option value="' . $model->id . '"> ' . $model->nome . '</option>';
		}
		print '</select>';
		echo $form->error ( $model, 'id_curso' );
		echo '</div>';
		
		echo '<div class="row buttons">';
		
		echo CHtml::submitButton ( $model->isNewRecord ? 'Create' : 'Save' );
		
		echo '</div>';
	} else {
		echo '<div class="row">';
		print "<h4>Não existe nenhum curso cadastrado , por favor crie um para que você possa prosseguir</h4>";
		echo '</div>';
	}
	
	?>

<?php $this->endWidget(); ?>

</div>
<!-- form -->