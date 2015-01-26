<?php

/**
 * This is the model class for table "time".
 *
 * The followings are the available columns in table 'time':
 * @property integer $id
 * @property integer $id_modalidade
 * @property string $id_curso
 *
 * The followings are the available model relations:
 * @property Curso $idCurso
 * @property Modalidade $idModalidade
 * @property TimeAtletas[] $timeAtletases
 */
class Time extends CActiveRecord {
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'time';
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
						'id_modalidade, id_curso',
						'required' 
				),
				array (
						'id_modalidade',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'id_curso',
						'length',
						'max' => 12 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_modalidade, id_curso',
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
				'idCurso' => array (
						self::BELONGS_TO,
						'Curso',
						'id_curso' 
				),
				'idModalidade' => array (
						self::BELONGS_TO,
						'Modalidade',
						'id_modalidade' 
				),
				'timeAtletases' => array (
						self::HAS_MANY,
						'TimeAtletas',
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
				'id_modalidade' => 'Id Modalidade',
				'id_curso' => 'Id Curso' 
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
		$criteria->compare ( 'id_modalidade', $this->id_modalidade );
		$criteria->compare ( 'id_curso', $this->id_curso, true );
		
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
	 * @return Time the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public $id;
	public $id_modalidade;
	public $id_curso;
	public $tecnico;
	public $auxiliar;
	public $atletas;
}
