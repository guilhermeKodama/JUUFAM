<?php

class InscricaoController extends Controller {

	public $id_chapa = "";
	public $erro = "";
	
	public function actionIndex() {

		$sqlChapa = "SELECT chapa.id as id FROM usuario JOIN chapa on usuario.id_chapa = chapa.id WHERE usuario.login = '" . Yii::app()->user->name . "'";
		$chapa = Yii::app()->db->createCommand($sqlChapa)->queryAll();

		foreach ($chapa as $key => $chapaz) {			
			$sqlCurso = "SELECT id FROM chapa_curso WHERE id_chapa = " . $chapaz["id"] . "";
			$cursos = Yii::app()->db->createCommand($sqlCurso)->queryAll();
		
			foreach ($cursos as $key => $curso) {			
				$this->id_chapa = $curso["id"];
			}				
		}

		$this->render('index');
	}

	function validaCPF($cpf = null) {
	 
	    // Verifica se um número foi informado
	    if(empty($cpf)) {
	        return false;
	    }
	 
	    // Elimina possivel mascara
	    $cpf = ereg_replace('[^0-9]', '', $cpf);
	    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	     
	    // Verifica se o numero de digitos informados é igual a 11
	    if (strlen($cpf) != 11) {
	        return false;
	    }
	    // Verifica se nenhuma das sequências invalidas abaixo
	    // foi digitada. Caso afirmativo, retorna falso
	    else if ($cpf == '00000000000' ||
	        $cpf == '11111111111' ||
	        $cpf == '22222222222' ||
	        $cpf == '33333333333' ||
	        $cpf == '44444444444' ||
	        $cpf == '55555555555' ||
	        $cpf == '66666666666' ||
	        $cpf == '77777777777' ||
	        $cpf == '88888888888' ||
	        $cpf == '99999999999') {
	        return false;
	     // Calcula os digitos verificadores para verificar se o
	     // CPF é válido
	     } else {  
	         
	        for ($t = 9; $t < 11; $t++) {
	             
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	            $d = ((10 * $d) % 11) % 10;
	            if ($cpf{$c} != $d) {
	                return false;
	            }
	        }
	 
	        return true;
	    }
	}	

	function mesmoCurso($cpf = null) {

		$sqlChapaUser = "SELECT id_chapa FROM usuario WHERE usuario.login = '" . Yii::app()->user->name . "'";
		$idChapaUser = Yii::app()->db->createCommand($sqlChapaUser)->queryAll()[0]['id_chapa'];

		$sqlAtleta = "SELECT id_curso FROM atleta WHERE cpf = '" . $cpf. "'";
		$cont = Yii::app()->db->createCommand($sqlAtleta)->queryAll();

		$sqlChapa = "SELECT id FROM chapa_curso WHERE id_curso LIKE '" . $cont[0]['id_curso']. "'";
		$idChapa = Yii::app()->db->createCommand($sqlChapa)->queryAll();

		foreach ($idChapa as $key => $value) {
			if ($value["id"] == $idChapaUser) {
				return true;
			}
		}

		return false;
	}	

	function existeAtleta ($cpf = null) {
		$sqlAtleta = "SELECT count(*) as soma FROM atleta WHERE cpf = '" . $cpf. "'";
		$cont = Yii::app()->db->createCommand($sqlAtleta)->queryAll();
		
		if ((int) $cont[0]['soma'] > 0) {
			return true;
		}

		return false;
	}	

	function validaModalidade($idModalidade, $numeroAtletas) {
		$sqlAtleta = "SELECT min_inscr as min, max_inscr as max FROM modalidade WHERE id = '" . $idModalidade. "'";
		$cont = Yii::app()->db->createCommand($sqlAtleta)->queryAll();

		if ($numeroAtletas >= $cont[0]['min'] && $numeroAtletas <= $cont[0]['max']) {
			return true;
		}

		if ($numeroAtletas < $cont[0]['min']) {
			$this->erro = "Numero de atletas é menor que o minimo para modalidade.";
		}

		if ($numeroAtletas > $cont[0]['max']) {
			$this->erro = "Numero de atletas excede máximo para modalidade.";
		}

		return false;
	}	

	function validaModalidadeTimes($idModalidade, $numeroTimes) {
		$sqlAtleta = "SELECT max_time FROM modalidade WHERE id = '" . $idModalidade. "'";
		$cont = Yii::app()->db->createCommand($sqlAtleta)->queryAll();

		if ($numeroTimes <= $cont[0]['max_time']) {
			return true;
		} 
		
		$this->erro = "Numero de times excede o limite da modalidade.";

		return false;
	}	

	public function valida($atletas, $time, $numeroTimes) {
		// Verifica se tem igual

		if ($this->validaModalidadeTimes($time->id_modalidade, $numeroTimes) == false) {
			return false;
		}

		if ($this->validaModalidade($time->id_modalidade, count($atletas)) == false) {
			return false;
		}

		if (count(trim($time->tecnico)) > 1) {
			if ($this->validaCPF($time->tecnico) == false) {
				$this->erro = "CPF de tecnico inválido.";
				return false;	
			}

			if ($this->existeAtleta($time->tecnico) == false) {
				$this->erro = "Este atleta (tecnico) não existe.";
				return false;	
			}

			if ($this->mesmoCurso($time->tecnico) == false) {
				$this->erro = "O tecnico não está na mesma chapa.";
				return false;	
			}
		}
		
		if (count(trim($time->auxiliar)) > 1) {
			if ($this->validaCPF($time->auxiliar) == false) {
				$this->erro = "CPF de auxiliar inválido.";
				return false;	
			}

			if ($this->existeAtleta($time->auxiliar) == false) {
				$this->erro = "Este atleta (auxiliar) não existe.";
				return false;	
			}

			if ($this->mesmoCurso($time->auxiliar) == false) {
				$this->erro = "O auxiliar não está na mesma chapa.";
				return false;	
			}
		}		

		for ($i=0; $i < (count($atletas) - 1); $i++) { 
			if ($atletas[$i]->id_atleta == $atletas[($i + 1)]->id_atleta) {
				$this->erro = "O mesmo atleta está inscrito mais de uma vez.";
				return false;
			}
		}

		for ($i=0; $i < count($atletas); $i++) { 
			if ($this->validaCPF($atletas[$i]->id_atleta) == false) {
				$this->erro = "CPF de atleta inválido.";
				return false;	
			}

			if ($this->existeAtleta($atletas[$i]->id_atleta) == false) {
				$this->erro = "Este atleta não existe.";
				return false;	
			}

			if ($this->mesmoCurso($atletas[$i]->id_atleta) == false) {
				$this->erro = "O atleta não está na mesma chapa.";
				return false;	
			}
		}

		return true;
	}

	public function actionCreate() {

		Yii::import('application.models.Time');
		Yii::import('application.models.TimeAtletasInscricao');

		ini_set ('display_errors', 0);
		ini_set ('display_startup_erros', 0);
		error_reporting ( E_ALL );
		
		if (isset ($_POST)) {
			
			$sqlChapa = "SELECT chapa.id as id FROM usuario JOIN chapa on usuario.id_chapa = chapa.id WHERE usuario.login = '" . Yii::app()->user->name . "'";
			$chapa = Yii::app()->db->createCommand($sqlChapa)->queryAll();

			foreach ($chapa as $key => $chapaz) {			
				$sqlCurso = "SELECT id FROM chapa_curso WHERE id_chapa = " . $chapaz["id"] . "";
				//echo $sqlCurso; exit;
				$cursos = Yii::app()->db->createCommand($sqlCurso)->queryAll();
				
				foreach ($cursos as $key => $curso) {			
					$id_chapa = $curso["id"];
				}				
			}

			$nomes = $_POST["nome"];

			$modalidade = $_POST["modalidade"];
			$countTimes = count($_POST["time_atletas"]);

			if (isset($_POST["id_time"])) {
				$countOldTeams = count($_POST["id_time"]);
				$oldTeams = $_POST["id_time"];

				for ($i = 0; $i < $countOldTeams; $i++) { 

					$sqlTime = "SELECT id FROM time WHERE id_modalidade = " . $modalidade . " AND id_chapa = " . $id_chapa . "";

					$teams = Yii::app()->db->createCommand($sqlTime)->queryAll();

					foreach ($teams as $key => $team) {			
						$sqlTime = "DELETE FROM time_atletas WHERE id_time = " . $team["id"];
						$command = Yii::app()->db->createCommand($sqlTime)->execute();
					}

					$sqlTime = "DELETE FROM time WHERE id_modalidade = " . $modalidade . " AND id_chapa = " . $id_chapa . "";
					$command = Yii::app()->db->createCommand($sqlTime)->execute();
				}
			}

			$tecnico = $_POST["tecnico"];
			$auxiliar = $_POST["auxiliar"];


			/*$erro = $this->isParamsValid ( $_POST );
			
			if ( !$erro ) {*/

			$array_times = [];

			for ($i=1; $i <= $countTimes; $i++) { 
				$atletas = explode(',', $_POST["time_atletas"][$i]);
 				unset($atletas[count($atletas) - 1]);

 				$time = new Time();

    			$time->id = NULL;
			    $time->id_modalidade = $modalidade;
			    $time->id_chapa = $id_chapa;
			    $time->tecnico = $tecnico[($i - 1)];
			    $time->auxiliar = $auxiliar[($i - 1)];

			    $time->atletas = [];

				foreach ($atletas as $key => $value) {
					$nome_atleta = $nomes[$value];

					$timeAtleta = new TimeAtletasInscricao();
					
					$timeAtleta->id = NULL;
					$timeAtleta->id_atleta = $nome_atleta;					
					$timeAtleta->id_time = $time->id;					

					$time->atletas[] = $timeAtleta;
				}

				$array_times[] = $time;
			}

			foreach ($array_times as $key => $value) {
				$sqlTime = "INSERT INTO time (id, id_modalidade, id_chapa, tecnico, auxiliar) VALUES (NULL, " . $value->id_modalidade . ", \"" . $value->id_chapa . "\"" . ", \"" . $value->tecnico . "\"" . ", \"" . $value->auxiliar . "\");";

				$command = Yii::app()->db->createCommand($sqlTime)->execute();

				$sqlTime2 = "SELECT id FROM time ORDER BY id DESC LIMIT 1";

				$id_time = Yii::app()->db->createCommand($sqlTime2)->queryRow()['id'];

				$resultValida = $this->valida($value->atletas, $value, count($array_times));

				if ($resultValida) {
					foreach ($value->atletas as $key => $value_atletas) {
						$value_atletas->id_time = $id_time;
						$value_atletas->id_atleta = trim($value_atletas->id_atleta);

						$sqlTime = "INSERT INTO time_atletas (id, id_atleta, id_time, id_repr, status) VALUES (NULL, \"" . $value_atletas->id_atleta . " \" , " . $value_atletas->id_time . ", \"representante\", \"aprovado\");";
						
						$command = Yii::app()->db->createCommand($sqlTime)->execute();
					}
				} else {
					$sqlNaovalidado = "DELETE FROM time WHERE id = " . $id_time;
					$command = Yii::app()->db->createCommand($sqlNaovalidado)->execute();
					$command = 0;
				}
			}

			if ($command == 1) {
				$this->render('sucesso');
			} else {
				$this->render('erro');
			}
		}
	}

	public function actionView() {
		Yii::import('application.models.Time');
		Yii::import('application.models.TimeAtletasInscricao');

		ini_set ('display_errors', 1);
		ini_set ('display_startup_erros', 1);
		error_reporting ( E_ALL );
		
		if (isset ($_GET)) {
			$modalidade = $_GET["modalidade"];
			$chapa = $_GET["chapa"];

			$time_json = array();


			$sqlTime = "SELECT * FROM time WHERE id_modalidade = " . $modalidade . " AND id_chapa = " . $chapa;

			$teams = Yii::app()->db->createCommand($sqlTime)->queryAll();

			foreach ($teams as $key => $team) {			

				$sqlAtletas = "SELECT id_atleta FROM time_atletas WHERE id_time = " . $team["id"];

				$atletas = Yii::app()->db->createCommand($sqlAtletas)->queryAll();
				
				$atletas_json = array();
				foreach ($atletas as $key => $atleta) {			
					$atletas_json[] = $atleta["id_atleta"];
				}

				$times = array('id_time' => $team["id"],'atletas' => $atletas_json, 'tecnico' => $team["tecnico"], 'auxiliar' => $team["auxiliar"]);

				$time_json[] = $times;
			}

			$this->layout=false;
			header('Content-type: application/json');
			echo CJavaScript::jsonEncode($time_json);
			Yii::app()->end(); 
		}	
	}

	public function actionViewmodalidades() {
		ini_set ('display_errors', 1);
		ini_set ('display_startup_erros', 1);
		error_reporting ( E_ALL );
		
		if (isset ($_GET)) {
			$modalidade = $_GET["modalidade"];

			$sqlTime = "SELECT min_inscr as min, max_inscr as max, max_time as times FROM modalidade WHERE id = " . $modalidade;

			$teams = Yii::app()->db->createCommand($sqlTime)->queryAll();

			foreach ($teams as $key => $team) {			
				$times = array('min_inscritos' => $team["min"], 'max_inscritos' => $team["max"], 'max_times' => $team["times"]);
			}

			$this->layout=false;
			header('Content-type: application/json');
			echo CJavaScript::jsonEncode($times);
			Yii::app()->end(); 
		}	
	}


	/*
	private function isParamsValid($params) {
 		return true;
	}
	/*public static function getAllModality() {
		//$models = Inscricao::model ()->findAllBySql ( "SELECT * from modalidades ");
		
		/*if (count ( $models ) > 0) {
			return $models [0];
		} else {
			return null;
		}
	}*/

	/*public function hasEventOpen() {
		$models = Evento::model ()->findAllBySql ( "SELECT * from evento where evento.data_end_event >= '" . date ( 'Y-m-d' ) . "'" );
		
		if (count ( $models ) > 0) {
			return true;
		} else {
			return false;
		}
	}*/
}