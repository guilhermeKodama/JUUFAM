<?php

/**
 * This is the model class for table "modalidade".
 *
 * The followings are the available columns in table 'modalidade':
 * @property integer $id
 * @property string $nome
 * @property string $tipo_modalidade
 * @property integer $min_inscr
 * @property integer $max_inscr
 * @property string $genero
 *
 * The followings are the available model relations:
 * @property AtletaModalidade[] $atletaModalidades
 * @property EventoModalidade[] $eventoModalidades
 */
class Modalidade extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modalidade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, tipo_modalidade, min_inscr, max_inscr, genero', 'required'),
			array('min_inscr, max_inscr', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>45),
			array('tipo_modalidade', 'length', 'max'=>10),
			array('genero', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, tipo_modalidade, min_inscr, max_inscr, genero', 'safe', 'on'=>'search'),
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
			'atletaModalidades' => array(self::HAS_MANY, 'AtletaModalidade', 'id_modalidade'),
			'eventoModalidades' => array(self::HAS_MANY, 'EventoModalidade', 'id_modalidade'),
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
			'tipo_modalidade' => 'Tipo Modalidade',
			'min_inscr' => 'Min Inscr',
			'max_inscr' => 'Max Inscr',
			'genero' => 'Genero',
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
		$criteria->compare('tipo_modalidade',$this->tipo_modalidade,true);
		$criteria->compare('min_inscr',$this->min_inscr);
		$criteria->compare('max_inscr',$this->max_inscr);
		$criteria->compare('genero',$this->genero,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modalidade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
