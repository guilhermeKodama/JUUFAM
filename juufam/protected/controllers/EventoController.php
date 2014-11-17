<?php
class EventoController extends Controller {
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function actionCreate() {
		ini_set ( 'display_errors', 1 );
		ini_set ( 'display_startup_erros', 1 );
		error_reporting ( E_ALL );
		
		if (isset ( $_POST )) {
			
			$model = new Evento ();
			$model->nome = $_POST ["nameEvent"];
			
			$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateIniEvent"] );
			$model->data_ini_event = $date->format ( 'Y-m-d' );
			
			$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateEndEvent"] );
			$model->data_end_event = $date->format ( 'Y-m-d' );
			
			$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateIniInscr"] );
			$model->data_ini_insc = $date->format ( 'Y-m-d' );
			
			$date = DateTime::createFromFormat ( 'd/m/Y', $_POST ["dateEndInscr"] );
			$model->data_end_insc = $date->format ( 'Y-m-d' );
			
			/* carregar o arquivo do modelo e colocar em um diretorio */
			$foto = $_FILES ["userfile"];
			$nome_imagem = "modelo_".date("Y").".pdf";
			$caminho_imagem = "/var/www/html/juufam/modelo_certificado/".$nome_imagem;
			
			if (move_uploaded_file ( $foto ["tmp_name"], $caminho_imagem )) {
				//carregou o arquivo com sucesso
			} else {
				print "Possivel ataque de upload! Aqui esta alguma informação:\n";
				print_r ( $_FILES );
			}
			
			$model->save ();
			// print_r ($model->getErrors());
			$this->redirect ( Yii::app ()->homeUrl );
		}
	}
	
	public static function getCurrentEventOpen() {
		$models = Evento::model ()->findAllBySql ( "SELECT * from evento where  evento.data_end_event >= '" . date ( 'Y-m-d' ) . "'" );
		
		if (count ( $models ) > 0) {
			return $models [0];
		} else {
			return null;
		}
	}
	/**Retorna os eventos anteriores(fechados) em forma de menu*/
	public function getMenuClosedEvents(){
		//array ('label' => 'Principal','url' => array ('/site/index'))
		$array = array();
		$models = Evento::model ()->findAllBySql ( "SELECT * from evento where evento.data_end_event < '" . date ( 'Y-m-d' ) . "'" );
		if (count ( $models ) > 0) {
			foreach ($models as $model){
				$array[] = array ('label' => $model->nome,'url' => array ('/site/index'));
			}
			
			return $array;
		}else{
			return $array;
		}
	}
	
	public function hasEventOpen() {
		$models = Evento::model ()->findAllBySql ( "SELECT * from evento where evento.data_end_event >= '" . date ( 'Y-m-d' ) . "'" );
		
		if (count ( $models ) > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters()
	 * {
	 * // return the filter configuration for this controller, e.g.:
	 * return array(
	 * 'inlineFilterName',
	 * array(
	 * 'class'=>'path.to.FilterClass',
	 * 'propertyName'=>'propertyValue',
	 * ),
	 * );
	 * }
	 *
	 * public function actions()
	 * {
	 * // return external action classes, e.g.:
	 * return array(
	 * 'action1'=>'path.to.ActionClass',
	 * 'action2'=>array(
	 * 'class'=>'path.to.AnotherActionClass',
	 * 'propertyName'=>'propertyValue',
	 * ),
	 * );
	 * }
	 */
}