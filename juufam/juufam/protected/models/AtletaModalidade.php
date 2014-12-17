<?php

/**
 * This is the model class for table "atleta_modalidade".
 *
 * The followings are the available columns in table 'atleta_modalidade':
 * @property integer $id_atleta
 * @property integer $id_modalidade
 * @property string $tipo_funcao
 *
 * The followings are the available model relations:
 * @property Modalidade $idModalidade
 * @property Atleta $idAtleta
 */
class AtletaModalidade extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atleta_modalidade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_atleta, id_modalidade, tipo_funcao', 'required'),
			array('id_atleta, id_modalidade', 'numerical', 'integerOnly'=>true),
			array('tipo_funcao', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_atleta, id_modalidade, tipo_funcao', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idModalidade' => array(self::BELONGS_TO, 'Modalidade', 'id_modalidade'),
			'idAtleta' => array(self::BELONGS_TO, 'Atleta', 'id_atleta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_atleta' => 'Id Atleta',
			'id_modalidade' => 'Id Modalidade',
			'tipo_funcao' => 'Tipo Funcao',
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
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_atleta',$this->id_atleta);
		$criteria->compare('id_modalidade',$this->id_modalidade);
		$criteria->compare('tipo_funcao',$this->tipo_funcao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AtletaModalidade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
