<?php

/**
 * This is the model class for table "TimeAtletas".
 *
 * The followings are the available columns in table 'TimeAtletas':
 * @property integer $id
 * @property string $nome
 * @property integer $id_uni
 *
 * The followings are the available model relations:
 * @property Curso[] $cursos
 * @property Unidade $idUni
 */
class TimeAtletas extends CActiveRecord{
	public $id;
	public $id_atleta;
	public $id_time;
	public $id_repr;
	public $status = "aprovado";
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'time_atletas';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'id_atleta, id_time, id_repr',
						'required' 
				),
				array (
						'id_time',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'id_atleta',
						'length',
						'max' => 11 
				),
				array (
						'id_repr',
						'length',
						'max' => 45 
				),
				array (
						'status',
						'length',
						'max' => 10 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_atleta, id_time, id_repr, status',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'idRepr' => array (
						self::BELONGS_TO,
						'Usuario',
						'id_repr' 
				),
				'atleta' => array (
						self::BELONGS_TO,
						'Atleta',
						'id_atleta' 
				),
				'idTime' => array (
						self::BELONGS_TO,
						'Time',
						'id_time' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'id' => 'ID',
				'id_atleta' => 'ID Atleta',
				'id_time' => 'ID Time',
				'id_repr' => 'ID Representante',
				'status' => 'Status' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'id_atleta', $this->id_atleta, true );
		$criteria->compare ( 'id_time', $this->id_time );
		$criteria->compare ( 'id_repr', $this->id_repr, true );
		$criteria->compare ( 'status', $this->status, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	public function searchExternalRegistrarion($login) {
		/*
		 * Pegar inscrições que o atleta é do teu curso mas o id_repr é diferente do seu* $criteria=new CDbCriteria; $criteria->compare('id',$this->id); $criteria->compare('id_atleta',$this->id_atleta,true); $criteria->compare('id_time',$this->id_time); $criteria->compare('id_repr', $login , true); $criteria->compare('status',$this->status,true); return new CActiveDataProvider($this, array( 'criteria'=>$criteria, ));
		 */
		$model = Usuario::model ()->findByPk ( $login );
		
		$criteria = new CDbCriteria ();
		/* SELECT */
		$criteria->select = "t.id,t.id_atleta,t.id_time,t.id_repr,t.status";
		/* JOIN */
		$criteria->join = "JOIN atleta as atleta ON t.id_atleta = atleta.cpf JOIN time ON t.id_time = time.id JOIN chapa ON time.id_chapa = chapa.id";
		/* WHERE */
		$criteria->condition = "atleta.id_curso IN (SELECT id_curso FROM chapa_curso WHERE id_chapa = " . $model->id_chapa . ") AND atleta.id_curso NOT IN  (SELECT id_curso FROM chapa_curso WHERE id_chapa = time.id_chapa)";
		$criteria->together = true;
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return TimeAtletas the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}