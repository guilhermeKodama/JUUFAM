<?php

/**
 * This is the model class for table "chapa".
 *
 * The followings are the available columns in table 'chapa':
 * @property integer $id
 * @property string $nome
 * @property integer $id_evento
 * @property integer $id_unidade
 *
 * The followings are the available model relations:
 * @property Evento $idEvento
 * @property Unidade $idUnidade
 * @property Usuario[] $usuarios
 */
class Chapa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chapa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, id_evento, id_unidade', 'required'),
			array('id_evento, id_unidade', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, id_evento, id_unidade', 'safe', 'on'=>'search'),
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
			'idEvento' => array(self::BELONGS_TO, 'Evento', 'id_evento'),
			'idUnidade' => array(self::BELONGS_TO, 'Unidade', 'id_unidade'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_chapa'),
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
			'id_evento' => 'Id Evento',
			'id_unidade' => 'Id Unidade',
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
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('id_unidade',$this->id_unidade);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Chapa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
