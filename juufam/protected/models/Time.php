<?php

/**
 * This is the model class for table "Time".
 *
 * The followings are the available columns in table 'Time':
 * @property integer $id
 * @property string $nome
 * @property integer $id_uni
 *
 * The followings are the available model relations:
 * @property Curso[] $cursos
 * @property Unidade $idUni
 */
class Time
{
    public $id;
    public $id_modalidade;
    public $id_chapa;
    public $tecnico;
    public $auxiliar;
    public $atletas;
}
