<?php
class InscricaoController extends Controller {
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function actionCreate() {
		
		ini_set ( 'display_errors', 1 );
		ini_set ( 'display_startup_erros', 1 );
		error_reporting ( E_ALL );
		
		if (isset ($_POST)) {
			echo "<pre>"; var_dump($_POST); exit;
			
			$erro = $this->isParamsValid ( $_POST );
			
			if ( !$erro ) {
				
				$model = new Inscricao();
				$model->nome = $_POST ["nameEvent"];
				
				$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateIniEvent"] );
				$model->data_ini_event = $date->format ( 'Y-m-d' );
				
				$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateEndEvent"] );
				$model->data_end_event = $date->format ( 'Y-m-d' );
				
				$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateIniInscr"] );
				$model->data_ini_insc = $date->format ( 'Y-m-d' );
				
				$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateEndInscr"] );
				$model->data_end_insc = $date->format ( 'Y-m-d' );
				
				$model->save ();
				
				$id_evento = $model->getPrimaryKey ();
				
				// print_r ($model->getErrors());
				$this->redirect ( Yii::app ()->homeUrl );
			}else{
				// parametros estão incorretos
				$this->render ( 'index',array('erro'=>$erro));
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