<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SintomasPacientesModel extends Model
{
    //Criando vinculo entre o model e a tabela
    protected $table = 'tb_sintomas_pacientes';
    protected $fillable = ['fk_sintomas_id','fk_paciente_id'];
    
    public function sintomas() {
        $this->hasMany(SintomasPacientesModel::class);
    }
    
    public function cadastroPaciente() {
        $this->hasMany(SintomasPacientesModel::class);
    }
}
