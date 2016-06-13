<?php

namespace App\Massoterapia\ProfissionalCargo\Model;

use Illuminate\Database\Eloquent\Model;

class CargoProfissionalModel extends Model
{
    protected $table = 'tb_cargo';
    protected $fillable = ['id','nome_cargo'];
    public $timestamps = false;
}
