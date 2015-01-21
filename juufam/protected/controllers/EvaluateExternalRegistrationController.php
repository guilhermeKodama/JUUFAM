<?php
class EvaluateExternalRegistrationController extends Controller {
	
	public function actionIndex() {
		$model = new TimeAtletas ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['TimeAtletas'] ))
			$model->attributes = $_GET ['TimeAtletas'];
		
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	
	public function actionApprove() {
		$model = $this->loadModel ( $_GET ['id'] );
		$model->status = "aprovado";
		$model->update ();
		
		$model = new TimeAtletas ( 'search' );
		$model->unsetAttributes ();
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	public function actionDecline() {
		$model = $this->loadModel ( $_GET ['id'] );
		$model->status = "reprovado";
		$model->update ();
		
		$model = new TimeAtletas ( 'search' );
		$model->unsetAttributes ();
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	public function actionBack() {
		$model = $this->loadModel ( $_GET ['id'] );
		$model->status = "em analise";
		$model->update ();
		
		$model = new TimeAtletas ( 'search' );
		$model->unsetAttributes ();
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	public function loadModel($id) {
		$model = TimeAtletas::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}