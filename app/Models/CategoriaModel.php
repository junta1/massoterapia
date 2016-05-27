<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    //Criando vinculo entre o model e a tabela
    protected $table = 'tb_categoria';
    protected $fillable = ['nome_categoria'];
}
