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
class TimeAtletas
{
    public $id;
    public $id_atleta;
    public $id_time;
    public $id_repr;
    public $status = "aprovado";
}