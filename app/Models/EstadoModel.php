<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoModel extends Model {

    protected $table = 'tb_estado';
    protected $fillable = ['nome', 'uf', 'fk_pais_id'];
    
    //Criando vinculo entre o model e a tabela
    public function pais() {
        return $this->hasMany(PaisModel::class);
    }

}
