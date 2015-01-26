<?php

class InscricaoController extends Controller {
	
	public function actionIndex() {
		$this->render ('index');
	}

	public function actionCreate() {

		Yii::import('application.models.Time');
		Yii::import('application.models.TimeAtletas');

		
		ini_set ( 'display_errors', 1 );
		ini_set ( 'display_startup_erros', 1 );
		error_reporting ( E_ALL );
		
		if (isset ($_POST)) {
			$nomes = $_POST["nome"];

			$modalidade = $_POST["modalidade"];
			$countTimes = count($_POST["time_atletas"]);

			if (isset($_POST["id_time"])) {
				$countOldTeams = count($_POST["id_time"]);
				$oldTeams = $_POST["id_time"];

				for ($i = 0; $i < $countOldTeams; $i++) { 

					$sqlTime = "SELECT id FROM time WHERE id_modalidade = " . $modalidade . " AND id_curso LIKE '%ICC015%'";

					$teams = Yii::app()->db->createCommand($sqlTime)->queryAll();

					foreach ($teams as $key => $team) {			
						$sqlTime = "DELETE FROM time_atletas WHERE id_time = " . $team["id"];
						$command = Yii::app()->db->createCommand($sqlTime)->execute();
					}

					$sqlTime = "DELETE FROM time WHERE id_modalidade = " . $modalidade . " AND id_curso LIKE '%ICC015%'";
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
			    $time->id_curso = "ICC015";
			    $time->tecnico = $tecnico[($i - 1)];
			    $time->auxiliar = $auxiliar[($i - 1)];

			    $time->atletas = [];

				foreach ($atletas as $key => $value) {
					$nome_atleta = $nomes[$value];

					$timeAtleta = new TimeAtletas();
					
					$timeAtleta->id = NULL;
					$timeAtleta->id_atleta = $nome_atleta;					
					$timeAtleta->id_time = $time->id;					

					$time->atletas[] = $timeAtleta;
				}

				$array_times[] = $time;
			}

			foreach ($array_times as $key => $value) {
				$sqlTime = "INSERT INTO time (id, id_modalidade, id_curso, tecnico, auxiliar) VALUES (NULL, " . $value->id_modalidade . ", \"" . $value->id_curso . "\"" . ", \"" . $value->tecnico . "\"" . ", \"" . $value->auxiliar . "\");";

				$command = Yii::app()->db->createCommand($sqlTime)->execute();

				$sqlTime2 = "SELECT id FROM time ORDER BY id DESC LIMIT 1";

				$id_time = Yii::app()->db->createCommand($sqlTime2)->queryRow()['id'];

				foreach ($value->atletas as $key => $value_atletas) {
					$value_atletas->id_time = $id_time;
					$value_atletas->id_atleta = trim($value_atletas->id_atleta);

					
					$sqlTime = "INSERT INTO time_atletas (id, id_atleta, id_time, id_repr, status) VALUES (NULL, \"" . $value_atletas->id_atleta . " \" , " . $value_atletas->id_time . ", \"representante\", \"aprovado\");";
					
					$command = Yii::app()->db->createCommand($sqlTime)->execute();
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
		Yii::import('application.models.TimeAtletas');

		ini_set ('display_errors', 1);
		ini_set ('display_startup_erros', 1);
		error_reporting ( E_ALL );
		
		if (isset ($_GET)) {
			$modalidade = $_GET["modalidade"];
			$curso = $_GET["curso"];

			$time_json = array();

			$sqlTime = "SELECT * FROM time WHERE id_modalidade = " . $modalidade . " AND id_curso LIKE \"%" . $curso . "%\"";

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