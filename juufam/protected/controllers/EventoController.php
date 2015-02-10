<?php
class EventoController extends Controller {
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function actionCreate() {
		$erro;
		
		ini_set ( 'display_errors', 1 );
		ini_set ( 'display_startup_erros', 1 );
		error_reporting ( E_ALL );
		
		if (isset ( $_POST )) {
			
			$erro = $this->isParamsValid ( $_POST );
			
			if ( !$erro ) {
				
				/* Salva informacões do evento do banco de dados */
				
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
				$nome_imagem = "modelo_" . date ( "Y" ) . ".pdf";
				$caminho_imagem = "/var/www/html/juufam/modelo_certificado/" . $nome_imagem;
				
				if (move_uploaded_file ( $foto ["tmp_name"], $caminho_imagem )) {
					// carregou o arquivo com sucesso
				} else {
					print "Possivel ataque de upload! Aqui esta alguma informação:\n";
					print_r ( $_FILES );
				}
				
				$model->save ();
				
				$id_evento = $model->getPrimaryKey ();
				
				/* Salva informacões do evento_modalidade no banco de dados */
				if (isset ( $_POST ["modalidades"] )) {
					$modalidades = $_POST ["modalidades"];
					foreach ( $modalidades as $modalidade_id ) {
						
						$model = new EventoModalidade ();
						$model->id_evento = $id_evento;
						$model->id_modalidade = $modalidade_id;
						
						$model->save ();
					}
				} else {
					// retorna erro que nenhuma modalidade foi selecionada
				}
				
				// print_r ($model->getErrors());
				$this->redirect ( Yii::app ()->homeUrl );
			}else{
				// parametros estão incorretos
				$this->render ( 'index',array('erro'=>$erro));
			}
		}
	}
	private function isParamsValid($params) {
		$nameIsOk = false;
		$dateIniEventIsOk = false;
		$dateEndEventIsOk = false;
		$dateIniInscrIsOk = false;
		$dateEndInscrIsOk = false;
		$modalidadesIsOk = false;
		
		$erro = array();
		
		if (isset ( $params ["nameEvent"] ) && strlen ( $params ["nameEvent"] ) > 0) {
			$nameIsOk = true;
		}else {
			$erro ["nameEvent"] = "Por favor digite o nome do evento";
			
 		}
 		
 		if (isset ( $params ["dateIniEvent"] ) && strlen ( $params ["dateIniEvent"] ) > 0) {
 			$dateIniEventIsOk = true;
 		}else {
 			$erro ["dateIniEvent"] = "Por favor digite a data inicial do evento";
 			
 		}
 		
 		if (isset ( $params ["dateEndEvent"] ) && strlen ( $params ["dateEndEvent"] ) > 0) {
 			$dateEndEventIsOk = true;
 		}else {
 			$erro ["dateEndEvent"] = "Por favor digite a data final do evento";
 			
 		}
 		
 		if (isset ( $params ["dateIniInscr"] ) && strlen ( $params ["dateIniInscr"] ) > 0) {
 			$dateIniInscrIsOk = true;
 		}else {
 			$erro ["dateIniInscr"] = "Por favor digite a data inicial da inscricao";
 			
 		}
 		
 		if (isset ( $params ["dateEndInscr"] ) && strlen ( $params ["dateEndInscr"] ) > 0) {
 			$dateEndInscrIsOk = true;
 		}else {
 			$erro ["dateEndInscr"] = "Por favor digite a data final da inscricao";
 			
 		}
 		
 		if (isset ( $params ["modalidades"] ) && sizeof ( $params ["modalidades"] ) > 0) {
 			$modalidades = true;
 		}else {
 			$erro ["modalidades"] = "Você precisa vincular o evento a pelo menos uma modalidade";
 			
 		}
 			
 		
 		
 		
 		if($nameIsOk && $dateIniEventIsOk && $dateEndEventIsOk 
 				&& $dateIniInscrIsOk && $dateEndInscrIsOk && $modalidadesIsOk){
 			return true;
 		}else{
 			return $erro;
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
	/**
	 * Retorna os eventos anteriores(fechados) em forma de menu
	 */
	public function getMenuClosedEvents() {
		// array ('label' => 'Principal','url' => array ('/site/index'))
		$array = array ();
		$models = Evento::model ()->findAllBySql ( "SELECT * from evento where evento.data_end_event < '" . date ( 'Y-m-d' ) . "'" );
		if (count ( $models ) > 0) {
			foreach ( $models as $model ) {
				$array [] = array (
						'label' => $model->nome,
						'url' => array (
								'/site/index' 
						) 
				);
			}
			
			return $array;
		} else {
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
	
	public function getAllEventos() {
		$models = Evento::model ()->findAll ();
		return $models;
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