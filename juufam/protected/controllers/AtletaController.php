<?php
class AtletaController extends Controller {
	private $erro = array ();
	
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete' 
		); // we only allow deletion via POST request
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules() {
		return array (
				array (
						'allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array (
								'index',
								'view' 
						),
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array (
								'create',
								'update' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array (
								'admin',
								'delete' 
						),
						'users' => array (
								'admin' 
						) 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * Displays a particular model.
	 *
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Atleta ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Atleta'] )) {
			
			$model->attributes = $_POST ['Atleta'];
			
			
			$model->cpf = preg_replace ( '/[^0-9]/is', '', $model->cpf );
			
			if ($this->isParamsValid ( $model )) {
				
				
				
				if ($model->save ())
					$this->redirect ( array (
							'view',
							'id' => $model->cpf 
					) );
			} else {
				
				$this->render ( 'create', array (
						'model' => $model,
						'erro' => $this->erro 
				) );
			}
		}
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	private function isParamsValid($model) {
		$isCpfDuplicated = false;
		$matriculaHasLetter = false;
		$isCPFWrong = false;
		$rgHasLetter = false;
		$nameHasNumber = false;
		
		/* Checa se o CPF é duplicado */
		$ids = array (
				$model->cpf 
		);
		
		$m = Atleta::model ()->findAllByPk ( $ids );
		
		if (sizeof ( $m ) > 0) {
			$this->erro ["cpf"] = "*Atleta Duplicado";
			$isCpfDuplicated = true;
		}
		
		/* Checa se a matricula tem letra */
		if (sizeof ( $model->matricula ) > 1) {
			if (! ctype_digit ( $model->matricula )) {
				$this->erro ["matricula"] = "*Matricula só pode conter números";
				$matriculaHasLetter = true;
			}
		}
		
		/* Checa se o CPF esta no formato correto */
		/*if (ValidationUtilities::isCPFValid ( $model->cpf )) {
			$this->erro ["cpf"] = "*CPF incorreto";
			$isCPFWrong = true;
		}*/
		
		/* Checa se o RH tem letra */
		if (sizeof ( $model->rg ) > 1) {
			if (! ctype_digit ( $model->rg )) {
				$this->erro ["rg"] = "*RG só pode conter números";
				$rgHasLetter = true;
			}
		}
		
		/* Checa se o nome tem numero */
		if (! ctype_alpha ( $model->nome )) {
			$this->erro ["nome"] = "*O nome não pode conter números";
			$nameHasNumber = true;
		}
		
		if ($isCpfDuplicated || $matriculaHasLetter || $isCPFWrong || $rgHasLetter || $nameHasNumber) {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Atleta'] )) {
			$model->attributes = $_POST ['Atleta'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->cpf 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel ( $id )->delete ();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (! isset ( $_GET ['ajax'] ))
			$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
					'admin' 
			) );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'Atleta' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Atleta ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Atleta'] ))
			$model->attributes = $_GET ['Atleta'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        	the ID of the model to be loaded
	 * @return Atleta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Atleta::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param Atleta $model
	 *        	the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'atleta-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
