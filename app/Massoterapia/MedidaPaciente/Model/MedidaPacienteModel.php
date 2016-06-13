<?php

namespace App\Massoterapia\MedidaPaciente\Model;

use Illuminate\Database\Eloquent\Model;

class MedidaPacienteModel extends Model
{
    protected $table = 'tb_medidas';
    protected $fillable = ['id','nome_area_medida'];
    protected $timestamp = false;
}
