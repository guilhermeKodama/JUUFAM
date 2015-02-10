<?php
/* @var $this CriarEventoController */
$this->breadcrumbs = array (
		'Criar Evento' 
);
?>
<!-- import javascript -->
<?php

$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ($baseUrl . '/js/jquery-1.11.1.min.js');
$cs->registerScriptFile ($baseUrl . '/js/jquery.maskedinput.js');
?>
</br><div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Inscrever Atletas</b></h1></div>
<hr>

<form enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Inscricao/Create'?>">

	<div class="escolha-modalidade">
		<select name="modalidade" id="modalidades">
		<?php
			$modalidadeModal = new ModalidadeController('modalidade');
			$modalidades = $modalidadeModal->getAllModality();
			
			foreach ($modalidades as $modalidade) {
				echo '<option value="' . $modalidade->id . '">' . $modalidade->nome . '</option>';
			}
		?>
		</select> 
	</div>

	<div class="big-box-team">
		<!--<div class="team team-1">
			<div class="team-title"> 
				<h3>Time 1</h3>
				<div class="team-title-menu"> 
					<div class="add-team">+</div>
				</div>
			</div>
			<div class="big-box big-box-1">
				<div class="box-atletas">
					<div class="info-atleta">
						<div class="new-atleta">
							<input type="text" name="nome[0]" placeholder="Matricula"/>
						</div>
						<div class="team-atleta-menu"> 
							<div class="add-atleta" onclick="addAtleta(this, 1);">+</div>
						</div>
					</div> 
					<div class="team-tech">
						<div class="new-atleta">
							<input type="text" name="tecnico[0]" placeholder="Matricula Tecnico"/>
						</div>

						<div class="new-atleta">
							<input type="text" name="auxiliar[0]" placeholder="Matricula Auxiliar"/>
						</div>						
					</div> 
				</div> 
			</div> 
			<input type="hidden" name="time[]" value="1" />
			<input type="hidden" class="atletascount-1" name="time_atletas[1]" value="0," />
		</div>	-->
	</div>	
	<div class="submit-inscricao">
		<input type="hidden" title="Inscrever" />
		<input type="submit" id="submit-ins" title="Inscrever" />
	</div>
</form>

<script type="text/javascript">
    var quantAtleta = 0,
    	quantTeams = 1;

    function createDivFieldsAtleta(){
    	quantAtleta++;

        var html  = '<div class="box-atletas box-atleta-' + quantAtleta + '">';
            html += '<div class="info-atleta">';
			html += '<div class="new-atleta">';
			html += 'Aluno: ';
			html += '<input type="text" name="nome[' + quantAtleta + ']" placeholder="Matricula"/>';
			html += '</div>';
			html += '<div class="team-atleta-menu"> ';
			html += '<div onclick="removerAtleta(this, ' + quantAtleta + ', ' + quantTeams + ');">-</div>';
			html += '</div>';
			html += '</div>';
			html += '</div> ';
			
            return html;
    }

	function addAtleta(value, quantTeam) { 
		$(".big-box-" + quantTeam + "").append(createDivFieldsAtleta());
		
		var elementnow = $(".atletascount-" + quantTeam),
			atual = elementnow.val();

		atual += quantAtleta + ",";
		elementnow.val(atual);
	}

    function createDivFieldsAtletaNew(){
    	quantAtleta++;

        var html  = '<div class="box-atletas">';
            html += '<div class="info-atleta">';
			html += '<div class="new-atleta">';
			html += 'Aluno: ';
			html += '<input type="text" name="nome[' + quantAtleta + ']" placeholder="Matricula"/>';
			html += '</div>';
			html += '<div class="team-atleta-menu"> ';
			html += '<div class="add-atleta" onclick="addAtleta(this, ' + quantTeams + ');">+</div>';
			html += '</div>';
			html += '</div>';
			html += '</div> ';

            return html;
    }    

	function removerTime(value, quantTeams) { 
		$(".team-" + quantTeams + "").remove();
	}

    function createDivFieldsTeam() {
    	quantTeams++;

        var htmlFirst  = [];
			
		htmlFirst.push('<div class="team team-' + quantTeams + '">');
        htmlFirst.push('<div class="team-title">');
		htmlFirst.push('<h3>Time</h3>');
		htmlFirst.push('<div class="team-title-menu">');
		htmlFirst.push('<div onclick="removerTime(this, ' + quantTeams + ');">-</div>');
		htmlFirst.push('</div></div>');
		htmlFirst.push('<div class="big-box big-box-' + quantTeams + '">');
		htmlFirst.push(createDivFieldsAtletaNew());
		htmlFirst.push('</div>');

		htmlFirst.push('<div class="team-tech">');
		htmlFirst.push('<div class="new-atleta">');
		htmlFirst.push('Técnico: ');
		htmlFirst.push('<input type="text" name="tecnico[]" placeholder="Matricula Tecnico"/>');
		htmlFirst.push('</div>');
		htmlFirst.push('<div class="new-atleta">');
		htmlFirst.push('Auxiliar: ');
		htmlFirst.push('<input type="text" name="auxiliar[]" placeholder="Matricula Auxiliar"/>');
		htmlFirst.push('</div>');
		htmlFirst.push('</div>');

		htmlFirst.push('<input type="hidden" name="time[]" value="' + quantTeams + '" />');
		htmlFirst.push('<input type="hidden" class="atletascount-' + quantTeams + '" name="time_atletas[' + quantTeams + ']" value="' + quantAtleta + '," />');
		htmlFirst.push('</div>');
		htmlFirst.push('</div>');
            
        return htmlFirst.join('');
    }    

    function getTotalItemsAtletas(){
        return $(".box-atletas").length - 1;
    }

    function getTotalItemsTeams(){
        return $(".team").length - 1;
    }

	function removerAtleta(value, quantAtleta, quantTeam) { 
		
		var elementnow = $(".atletascount-" + quantTeam),
			atual = elementnow.val();

		atual = atual.replace(quantAtleta + ",", "");
		elementnow.val(atual);

		$(".box-atleta-" + quantAtleta + "").remove();
	}

$(function(){
	getTeams($("#modalidades:first").val());

  	$(".team .add-team").click(function(){
        return false;
    });        

  	$("#modalidades").change(function(){
  		getTeams($(this).val());
    });        

});

function createNewTeam() {
	$(".big-box-team").append(createDivFieldsTeam());
}

function getTeams(modalidade_param) {
	var modalidade = modalidade_param,
		curso = "ICC015",
		url = "<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Inscricao/view'; ?>" + "&modalidade=" + modalidade + '&curso=' + curso;

	$.get(url, function(times) {

		$(".big-box-team").empty();
		
		if (times.length > 0) {
			createTeams(times);
		} else {
			createFirstTeam();			
		}
	});  		
}

function createTeams(times) {
	var key = 0;

	times.forEach(function(time) {	
		var htmlFirst = [];

		htmlFirst.push('<div class="team team-' + (key + 1) + '">');
		htmlFirst.push('<div class="team-title">');
		htmlFirst.push('<h3>Time</h3>');
		htmlFirst.push('<div class="team-title-menu">');

		if (key == 0) {
			htmlFirst.push('<div class="add-team" onclick="createNewTeam();">+</div>');
		} else {
			htmlFirst.push('<div onclick="removerTime(this, ' + (key + 1) + ');">-</div>');	
		}

		htmlFirst.push('</div>');
		htmlFirst.push('</div>');
		htmlFirst.push('<div class="big-box big-box-1">');
		
		var inseridos = [];

		for (var i = 0; i < time.atletas.length; i++) {

			htmlFirst.push('<div class="box-atletas box-atleta-' + i + '">');
			htmlFirst.push('<div class="info-atleta">');
			htmlFirst.push('<div class="new-atleta">');
			htmlFirst.push('Aluno: ');
			htmlFirst.push('<input type="text" name="nome[' + i + ']" placeholder="Matricula" value="' + time.atletas[i] + '"/>');
			htmlFirst.push('</div>');
			htmlFirst.push('<div class="team-atleta-menu">');
			
			if (i == 0) {
				htmlFirst.push('<div class="add-atleta" onclick="addAtleta(this, ' + (i + 1) + ');">+</div>');
			} else {
				htmlFirst.push('<div onclick="removerAtleta(this, ' + i + ', ' + quantTeams + ');">-</div>');
			}

			htmlFirst.push('</div>');
			htmlFirst.push('</div>');	
			htmlFirst.push('</div>'); 

			inseridos.push(i);
		};

		quantAtleta = inseridos.length - 1;

		if (time.tecnico == null) {
			time.tecnico = "";
		}		

		if (time.auxiliar == null) {
			time.auxiliar = "";
		}		

		
		htmlFirst.push('</div>'); 

		htmlFirst.push('<div class="team-tech">');
		htmlFirst.push('<div class="new-atleta">');
		htmlFirst.push('Técnico: ');
		htmlFirst.push('<input type="text" name="tecnico[0]" placeholder="Matricula Tecnico" value="' + time.tecnico + '"/>');
		htmlFirst.push('</div>');
		htmlFirst.push('<div class="new-atleta">');
		htmlFirst.push('Auxiliar: ');
		htmlFirst.push('<input type="text" name="auxiliar[0]" placeholder="Matricula Auxiliar" value="' + time.auxiliar + '" />');
		htmlFirst.push('</div>');
		htmlFirst.push('</div>');

		htmlFirst.push('<input type="hidden" name="id_time[]" value="' + time.id_time + '" />');
		htmlFirst.push('<input type="hidden" name="time[]" value="1" />');
		htmlFirst.push('<input type="hidden" class="atletascount-1" name="time_atletas[1]" value="' + inseridos.join(',') + '," />');
		htmlFirst.push('</div>');	

		$(".big-box-team").append(htmlFirst.join(''));
		
		key++;
	});
}

function createFirstTeam() {
	var htmlFirst = [];

	htmlFirst.push('<div class="team team-1">');
	htmlFirst.push('<div class="team-title">');
	htmlFirst.push('<h3>Time</h3>');
	htmlFirst.push('<div class="team-title-menu">');
	htmlFirst.push('<div class="add-team" onclick="createNewTeam();">+</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('<div class="big-box big-box-1">');
	htmlFirst.push('<div class="box-atletas">');
	htmlFirst.push('<div class="info-atleta">');
	htmlFirst.push('<div class="new-atleta">');
	htmlFirst.push('Aluno: ');
	htmlFirst.push('<input type="text" name="nome[0]" placeholder="Matricula"/>');
	htmlFirst.push('</div>');
	htmlFirst.push('<div class="team-atleta-menu">');
	htmlFirst.push('<div class="add-atleta" onclick="addAtleta(this, 1);">+</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>'); 
	
	htmlFirst.push('</div>'); 
	htmlFirst.push('<div class="team-tech">');
	htmlFirst.push('<div class="new-atleta">');
	htmlFirst.push('Técnico: ');
	htmlFirst.push('<input type="text" name="tecnico[0]" placeholder="Matricula Tecnico"/>');
	htmlFirst.push('</div>');
	htmlFirst.push('<div class="new-atleta">');
	htmlFirst.push('Auxiliar: ');
	htmlFirst.push('<input type="text" name="auxiliar[0]" placeholder="Matricula Auxiliar"/>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>');

	htmlFirst.push('<input type="hidden" name="time[]" value="1" />');
	htmlFirst.push('<input type="hidden" class="atletascount-1" name="time_atletas[1]" value="0," />');
	htmlFirst.push('</div>');	

	$(".big-box-team").append(htmlFirst.join(''));
}

</script>