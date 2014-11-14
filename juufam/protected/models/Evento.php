<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property integer $id
 * @property string $nome
 * @property string $data_ini_event
 * @property string $data_end_event
 * @property string $data_ini_insc
 * @property string $data_end_insc
 * @property string $cert_conc_path
 *
 * The followings are the available model relations:
 * @property Chapa[] $chapas
 */
class Evento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'length', 'max'=>45),
			array('data_ini_event, data_end_event, data_ini_insc, data_end_insc, cert_conc_path', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, data_ini_event, data_end_event, data_ini_insc, data_end_insc, cert_conc_path', 'safe', 'on'=>'search'),
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
			'chapas' => array(self::HAS_MANY, 'Chapa', 'id_evento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'data_ini_event' => 'Data Ini Event',
			'data_end_event' => 'Data End Event',
			'data_ini_insc' => 'Data Ini Insc',
			'data_end_insc' => 'Data End Insc',
			'cert_conc_path' => 'Cert Conc Path',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_ini_event',$this->data_ini_event,true);
		$criteria->compare('data_end_event',$this->data_end_event,true);
		$criteria->compare('data_ini_insc',$this->data_ini_insc,true);
		$criteria->compare('data_end_insc',$this->data_end_insc,true);
		$criteria->compare('cert_conc_path',$this->cert_conc_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
