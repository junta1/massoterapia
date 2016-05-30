<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SintomasModel extends Model
{
    //Criando vinculo entre o model e a tabela
    protected $table = 'tb_sintomas';
    protected $fillable = ['nome_sintomas','fk_categoria_id'];
    
    
    public function categoria() {
        return $this->belongsTo(CategoriaModel::class);
    }
}