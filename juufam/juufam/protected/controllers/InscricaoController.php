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

			$modalidade = count($_POST["modalidade"]);
			$countTimes = count($_POST["time_atletas"]);
			
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
			    $time->atletas = [];

				foreach ($atletas as $key => $value) {
					$nome_atleta = $nomes[$value];
					$tipo_atleta = $_POST["typeatleta-" . $value];

					$timeAtleta = new TimeAtletas();
					
					$timeAtleta->id = NULL;
					$timeAtleta->id_atleta = $nome_atleta;					
					$timeAtleta->id_time = $time->id;					
					$timeAtleta->tipo_atleta = $tipo_atleta;

					$time->atletas[] = $timeAtleta;
				}

				$array_times[] = $time;
			}

			foreach ($array_times as $key => $value) {
				$sqlTime = "INSERT INTO time (id, id_modalidade, id_curso) VALUES (NULL, " . $value->id_modalidade . ", \"" . $value->id_curso . "\");";

				$command = Yii::app()->db->createCommand($sqlTime)->execute();

				$sqlTime2 = "SELECT id FROM time ORDER BY id DESC LIMIT 1";

				$id_time = Yii::app()->db->createCommand($sqlTime2)->queryRow()['id'];

				foreach ($value->atletas as $key => $value_atletas) {
					$value_atletas->id_time = $id_time;
					$value_atletas->id_atleta = trim($id_time);
					$sqlTime = "INSERT INTO time_atletas (id, id_atleta, id_time, tipo_atleta) VALUES (NULL, \"" . $value_atletas->id_atleta . " \" , " . $value_atletas->id_time . ", \"" . $value_atletas->tipo_atleta . "\");";
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