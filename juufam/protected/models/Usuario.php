<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $nome
 * @property string $login
 * @property string $senha
 * @property string $id_tipo_usuario
 * @property integer $id_chapa
 *
 * The followings are the available model relations:
 * @property ReprAtleta[] $reprAtletas
 * @property TimeAtletas[] $timeAtletases
 * @property Chapa $idChapa
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, login, email, senha, id_tipo_usuario, id_chapa', 'required'),
			array('id_chapa', 'numerical', 'integerOnly'=>true),
			array('nome, login, email, senha', 'length', 'max'=>45),
			array('id_tipo_usuario', 'length', 'max'=>13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nome, login, email, senha, id_tipo_usuario, id_chapa', 'safe', 'on'=>'search'),
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
			'reprAtletas' => array(self::HAS_MANY, 'ReprAtleta', 'id_repr'),
			'timeAtletases' => array(self::HAS_MANY, 'TimeAtletas', 'id_repr'),
			'idChapa' => array(self::BELONGS_TO, 'Chapa', 'id_chapa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nome' => 'Nome',
			'login' => 'Login',
                        'email' => 'Email',
			'senha' => 'Senha',
			'id_tipo_usuario' => 'Id Tipo Usuario',
			'id_chapa' => 'Id Chapa',
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

		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('login',$this->login,true);
                $criteria->compare('email',$this->email,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('id_tipo_usuario',$this->id_tipo_usuario,true);
		$criteria->compare('id_chapa',$this->id_chapa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	private function getLogin(){
		$this->login;
	}

}
