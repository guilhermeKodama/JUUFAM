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
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.11.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/jquery.maskedinput.js' );
?>
<h1>Inscrever atletas</h1>

<!--<form enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Evento/Create'?>">
	
	<?php if(isset($erro["nameEvent"])){echo '<font size="2" color="red">'.$erro["nameEvent"].'</font>';}?>
	<div>
		<input type="text" name="nameEvent" placeholder="Nome da edicão">
	</div>
	<div>
	<?php if(isset($erro["dateIniEvent"])){echo '<font size="2" color="red">'.$erro["dateIniEvent"].'</font>';}?>
		<input id="dateIniEvent" name="dateIniEvent" type="text"
			placeholder="Data inicio evento"> 
	<?php if(isset($erro["dateEndEvent"])){echo '<font size="2" color="red">'.$erro["dateEndEvent"].'</font>';}?>
		<input id="dateEndEvent" name="dateEndEvent" type="text"
			placeholder="Data fim evento">
	</div>
	<div>
	<?php if(isset($erro["dateIniInscr"])){echo '<font size="2" color="red">'.$erro["dateIniInscr"].'</font>';}?>
		<input id="dateIniInscr" name="dateIniInscr" type="text"
			placeholder="Data inicio inscricão"> 
	<?php if(isset($erro["dateEndInscr"])){echo '<font size="2" color="red">'.$erro["dateEndInscr"].'</font>';}?>
			<input id="dateEndInscr" name="dateEndInscr" type="text"
			placeholder="Data fim inscricão">
	</div>
	<div>
		<h3>Modelo do certificado</h3>
		<input type="file" id="userfile" name="userfile"
			accept="application/pdf">
	</div>

	<div>

		<h3>Selecione as modalidades que estarão nesta edicão do evento</h3>
		<?php if(isset($erro["modalidades"])){echo '<font size="2" color="red">'.$erro["modalidades"].'</font>';}?>

-->
<form enctype="multipart/form-data" method="post"
	action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=Inscricao/Create'?>">

	<div class="escolha-modalidade">
		<select>
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
		<div class="team team-1">
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
							<input type="text" name="nome[]" placeholder="Matricula"/>
							<input type="radio" name="typeatleta-0" value="tecnico">Técnico
							<input type="radio" name="typeatleta-0" value="atleta" checked>Atleta
						</div>
						<div class="team-atleta-menu"> 
							<div class="add-atleta" onclick="addAtleta(this, 1);">+</div>
						</div>
					</div> 
				</div> 
			</div> 
			<input type="hidden" name="time[]" value="1" />
			<input type="hidden" class="atletascount" name="time_atletas[1]" value="1," />
		</div>	
	</div>	
	<div class="submit-inscricao">
		<input type="submit" id="submit-ins" title="Inscrever" />
	</div>
</form>

<script type="text/javascript">

    var quantAtleta = 1,
    	quantTeams = 1;

    function createDivFieldsAtleta(){
    	quantAtleta++;

        var html  = '<div class="box-atletas box-atleta-' + quantAtleta + '">';
            html += '<div class="info-atleta">';
			html += '<div class="new-atleta">';
			html += '<input type="text" name="nome[]" placeholder="Matricula"/>';
			html += '<input type="radio" name="typeatleta-' + quantAtleta + '" value="tecnico">Técnico';
			html += '<input type="radio" name="typeatleta-' + quantAtleta + '" value="atleta" checked>Atleta';
			html += '</div>';
			html += '<div class="team-atleta-menu"> ';
			html += '<div onclick="removerAtleta(this, ' + quantAtleta + ');">-</div>';
			html += '</div>';
			html += '</div>';
			html += '</div> ';
			
            return html;
    }

	function addAtleta(value, quantTeam) { 
		var selector = $(value).closest(".team").get();
		var element = $(selector);

		
		$(".big-box-" + quantTeam + "").append(createDivFieldsAtleta());
		
		var elementnow = $(element.children(".atletascount"));
		var atual = $(element.children(".atletascount")).val();
		
		atual += quantAtleta + ",";
		elementnow.val(atual);
	}


    function createDivFieldsAtletaNew(){
    	quantAtleta++;

        var html  = '<div class="box-atletas">';
            html += '<div class="info-atleta">';
			html += '<div class="new-atleta">';
			html += '<input type="text" name="nome[]" placeholder="Matricula"/>';
			html += '<input type="radio" name="typeatleta-' + quantAtleta + '" value="tecnico">Técnico';
			html += '<input type="radio" name="typeatleta-' + quantAtleta + '" value="atleta" checked>Atleta';
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

        var html  = '<div class="team team-' + quantTeams + '">';
            html += '<div class="team-title">';
			html += '<h3>Time ' + quantTeams + '</h3>';
			html += '<div class="team-title-menu"> ';
			html += '<div onclick="removerTime(this, ' + quantTeams + ');">-</div>';
			html += '</div></div>';
			html += '<div class="big-box big-box-' + quantTeams + '">';
			html += createDivFieldsAtletaNew();
			html += '</div>';
			html += '</div></div>';
			html += '<input type="hidden" name="time[]" value="' + quantTeams + '" />';
			html += '<input type="hidden" class="atletascount" name="time_atletas[' + quantTeams + ']" value="" />';
            return html;
    }    

    function getTotalItemsAtletas(){
        return $(".box-atletas").length - 1;
    }

    function getTotalItemsTeams(){
        return $(".team").length - 1;
    }

	function removerAtleta(value, quantAtleta) { 
		$(".box-atleta-" + quantAtleta + "").remove();
	}

$(function(){
  	$(".team .add-team").click(function(){
        $(".big-box-team").append(createDivFieldsTeam());
        return false;
    });        
});
</script>

	<!--
</form>-->

<!-- <h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
 -->
