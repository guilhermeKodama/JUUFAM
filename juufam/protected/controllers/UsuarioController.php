<?php
class UsuarioController extends Controller {
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function loginIsValid($login, $password) {
		$id = array (
				$login 
		);
		
		$model = Usuario::model ()->findAllByPk ( $id );
		
		if (sizeof ( $model ) > 0) {
			
			if ($model[0]->senha == $password) {
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
         

	}
	public static function isAdmin ($login){
            $id = array ($login);
             $model = Usuario::model()->findAllByPk($id);
             if (sizeof ($model) > 0){
                 if ($model[0] ->id_tipo_usuario == "admin"){
                     return true;
                 }else{
                     return false;
                 }
             }
        }
        public static function isRepresentante ($login){
            $id = array ($login);
             $model = Usuario::model()->findAllByPk($id);
             if (sizeof ($model) > 0){
                 if ($model[0] ->id_tipo_usuario == "representante"){
                     return true;
                 }else{
                     return false;
                 }
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