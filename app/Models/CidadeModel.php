<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CidadeModel extends Model
{
    protected $table = 'tb_cidade';
    protected $fillable = ['nome','fk_estado_id'];
    
    //Criando vinculo entre o model e a tabela
    public function estado() {
        return $this->hasMany(EstadoModel::class);
    }
}
