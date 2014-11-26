<?php

/**
 * This is the model class for table "repr_atleta".
 *
 * The followings are the available columns in table 'repr_atleta':
 * @property integer $id_repr
 * @property integer $id_atleta
 * @property string $data
 *
 * The followings are the available model relations:
 * @property Atleta $idAtleta
 * @property Usuario $idRepr
 */
class ReprAtleta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'repr_atleta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_repr, id_atleta, data', 'required'),
			array('id_repr, id_atleta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_repr, id_atleta, data', 'safe', 'on'=>'search'),
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
			'idAtleta' => array(self::BELONGS_TO, 'Atleta', 'id_atleta'),
			'idRepr' => array(self::BELONGS_TO, 'Usuario', 'id_repr'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_repr' => 'Id Repr',
			'id_atleta' => 'Id Atleta',
			'data' => 'Data',
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

		$criteria->compare('id_repr',$this->id_repr);
		$criteria->compare('id_atleta',$this->id_atleta);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReprAtleta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
