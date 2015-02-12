<?php

/**
 * This is the model class for table "atleta".
 *
 * The followings are the available columns in table 'atleta':
 * @property string $matricula
 * @property string $cpf
 * @property string $rg
 * @property string $nome
 * @property string $data_nasc
 * @property string $genero
 * @property string $tipo_atleta
 * @property string $id_curso
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Curso $idCurso
 * @property ReprAtleta[] $reprAtletas
 * @property TimeAtletas[] $timeAtletases
 */
class Atleta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atleta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpf, nome, data_nasc, genero, tipo_atleta, id_curso', 'required'),
			array('matricula', 'length', 'max'=>8),
			array('cpf, tipo_atleta', 'length', 'max'=>11),
			array('rg', 'length', 'max'=>255),
			array('nome, data_nasc', 'length', 'max'=>45),
			array('genero', 'length', 'max'=>9),
			array('id_curso', 'length', 'max'=>12),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('matricula, cpf, rg, nome, data_nasc, genero, tipo_atleta, id_curso, status', 'safe', 'on'=>'search'),
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
			'idCurso' => array(self::BELONGS_TO, 'Curso', 'id_curso'),
			'reprAtletas' => array(self::HAS_MANY, 'ReprAtleta', 'id_atleta'),
			'timeAtletases' => array(self::HAS_MANY, 'TimeAtletas', 'id_atleta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'matricula' => 'Matrícula',
			'cpf' => 'CPF',
			'rg' => 'RG',
			'nome' => 'Nome',
			'data_nasc' => 'Data de Nascimento',
			'genero' => 'Gênero',
			'tipo_atleta' => 'Tipo de Atleta',
			'id_curso' => 'ID Curso',
			'status' => 'Status',
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

		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_nasc',$this->data_nasc,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('tipo_atleta',$this->tipo_atleta,true);
		$criteria->compare('id_curso',$this->id_curso,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchEgresso(){
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_nasc',$this->data_nasc,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('tipo_atleta','egresso',true);
		$criteria->compare('id_curso',$this->id_curso,true);
		$criteria->compare('status',$this->status,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Atleta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
