<?php
/* @var $this CriarEventoController */
$this->breadcrumbs = array (
		'Criar Evento' 
);
?>

<!-- import javascript -->
<?php
	$baseUrl = Yii::app()->baseUrl;
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile ($baseUrl . '/js/jquery-1.11.1.min.js');
	$cs->registerScriptFile ($baseUrl . '/js/jquery.maskedinput.js');
?>

<script type="text/javascript">
	function SomenteNumero(e){
		var tecla=(window.event)?event.keyCode:e.which;
		if ((tecla>47 && tecla<58)) {
			return true;
		} else {
			if (tecla==8 || tecla==0) {
				return true;
			} else {
			 return false;
			}
		}
	}
</script>


<div class="infoblock shadow"><h1 style="color:#4682B4;"><b>Inscrever Atletas</b></h1></div>
<hr>

<form enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/Inscricao/Create'?>">

	<div class="escolha-modalidade">
		<div class="modali">
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
		<div class="msg-modalidade">
			<p></p>
		</div>
	</div>

<!--	<div class="big-box-team">-->


<div class="big-box-team">
	<div class="team team-1">
		<div class="team-title">
			<h3>Time</h3>
			<div class="team-title-menu">
				<div onclick="createNewTeam();" class="add-team">+</div>
			</div>
		</div>
		<div class="big-box big-box-1">
			<div class="box-atletas">
				<div class="info-atleta">
					<div class="new-atleta">Aluno: <input type="text" name="nome[0]" placeholder="CPF"></div>
					<div class="team-atleta-menu"><div onclick="addAtleta(this, 1);" class="add-atleta">+</div>
				</div>
			</div>
		</div>
		</div>
		<div class="team-tech">
			<div><p>Técnico: </p><input type="text" placeholder="CPF Técnico" name="tecnico[0]"></div>
			<div><p>Auxiliar: </p><input type="text" placeholder="CPF Auxiliar" name="auxiliar[0]"></div>
		</div>
		<input type="hidden" value="1" name="time[]">
		<input type="hidden" value="0," name="time_atletas[1]" class="atletascount-1">
	</div>
</div>	
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
	<!--</div>	-->
	<div class="submit-inscricao">
		<input type="hidden" title="Inscrever" />
		<input type="submit" id="submit-ins" value="Inscrever" />
	</div>
</form>
<div style="text-align: center;">
	<button id="print-inscricao">Imprimir</button>
</div>

<script type="text/javascript">
    var quantAtleta = 0,
    	quantTeams = 1;

    function createDivFieldsAtleta(){
    	quantAtleta++;

        var html  = '<div class="box-atletas box-atleta-' + quantAtleta + '">';
            html += '<div class="info-atleta">';
			html += '<div class="new-atleta">';
			html += 'Aluno: ';
			html += '<input type="text" name="nome[' + quantAtleta + ']" placeholder="CPF" maxlength="11" onkeypress="return SomenteNumero(event)" />';
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
			html += '<input type="text" name="nome[' + quantAtleta + ']" placeholder="CPF" maxlength="11" onkeypress="return SomenteNumero(event)" />';
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
		htmlFirst.push('<div>');
		htmlFirst.push('<p>Técnico: </p>');
		htmlFirst.push('<input type="text" name="tecnico[]" placeholder="CPF Tecnico" maxlength="11" onkeypress="return SomenteNumero(event)" />');
		htmlFirst.push('</div>');
		htmlFirst.push('<div>');
		htmlFirst.push('<p>Auxiliar: </p>');
		htmlFirst.push('<input type="text" name="auxiliar[]" placeholder="CPF Auxiliar" maxlength="11" onkeypress="return SomenteNumero(event)" />');
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
	getModalidade($("#modalidades:first").val());

  	$(".team .add-team").click(function(){
        return false;
    });        

  	$("#print-inscricao").click(function(){
		var modalidade = $("#modalidades").val(),
			chapa = "<?php echo $this->id_chapa; ?>",
			url = "<?php echo Yii::app()->getBaseUrl(true).'/index.php/relatorio/print'; ?>" + "?modalidade=" + modalidade + '&curso=' + chapa + "&r=relatorio%2Fprint";

  		window.location.replace(url);
    });         

  	$("#modalidades").change(function(){
  		getTeams($(this).val());
  		getModalidade($(this).val());
    });        

});

function createNewTeam() {
	$(".big-box-team").append(createDivFieldsTeam());
}

function getTeams(modalidade_param) {
	var modalidade = modalidade_param,
		chapa = "<?php echo $this->id_chapa; ?>",
		url = "<?php echo Yii::app()->getBaseUrl(true).'/index.php/Inscricao/view'; ?>" + "?modalidade=" + modalidade + '&chapa=' + chapa;

	$.get(url, function(times) {

		$(".big-box-team").empty();
		
		if (times.length > 0) {
			createTeams(times);
		} else {
			createFirstTeam();			
		}
	});  		
}

function getModalidade(modalidade_param) {
	var modalidade = modalidade_param,
		url = "<?php echo Yii::app()->getBaseUrl(true).'/index.php/Inscricao/viewmodalidades'; ?>" + "?modalidade=" + modalidade;

	$.get(url, function(times) {
		if (times.max_times == "0") {
			times.max_times = "Ilimitado";
		}

		$(".msg-modalidade p").empty().append("Minimo: " + times.min_inscritos + " atleta(s); Máximo: " + times.max_inscritos + " atleta(s); Máximo Times: " + times.max_times);
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
			htmlFirst.push('<input type="text" name="nome[' + i + ']" placeholder="CPF" value="' + time.atletas[i] + '" maxlength="11" onkeypress="return SomenteNumero(event)" />');
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
		htmlFirst.push('<div>');
		htmlFirst.push('<p>Técnico: </p>');
		htmlFirst.push('<input type="text" name="tecnico[0]" placeholder="CPF Tecnico" value="' + time.tecnico + '" maxlength="11" onkeypress="return SomenteNumero(event)" />');
		htmlFirst.push('</div>');
		htmlFirst.push('<div>');
		htmlFirst.push('<p>Auxiliar: </p>');
		htmlFirst.push('<input type="text" name="auxiliar[0]" placeholder="CPF Auxiliar" value="' + time.auxiliar + '" maxlength="11" onkeypress="return SomenteNumero(event)" />');
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
	htmlFirst.push('<input type="text" name="nome[0]" placeholder="CPF" maxlength="11" onkeypress="return SomenteNumero(event)" />');
	htmlFirst.push('</div>');
	htmlFirst.push('<div class="team-atleta-menu">');
	htmlFirst.push('<div class="add-atleta" onclick="addAtleta(this, 1);">+</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>'); 
	
	htmlFirst.push('</div>'); 
	htmlFirst.push('<div class="team-tech">');
	htmlFirst.push('<div>');
	htmlFirst.push('<p>Técnico: </p>');
	htmlFirst.push('<input type="text" name="tecnico[0]" placeholder="CPF Técnico" maxlength="11" onkeypress="return SomenteNumero(event)" />');
	htmlFirst.push('</div>');
	htmlFirst.push('<div>');
	htmlFirst.push('<p>Auxiliar: </p>');
	htmlFirst.push('<input type="text" name="auxiliar[0]" placeholder="CPF Auxiliar" maxlength="11" onkeypress="return SomenteNumero(event)" />');
	htmlFirst.push('</div>');
	htmlFirst.push('</div>');

	htmlFirst.push('<input type="hidden" name="time[]" value="1" />');
	htmlFirst.push('<input type="hidden" class="atletascount-1" name="time_atletas[1]" value="0," />');
	htmlFirst.push('</div>');	

	$(".big-box-team").append(htmlFirst.join(''));
}
	jQuery(function($){
		$('input[type="text"]').mask("999.999.999-99",{ placeholder:"" });
	});

</script>