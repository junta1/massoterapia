<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaisModel extends Model
{
    //Criando vinculo entre o model PaisModel e a tabela tb_pais
    protected $table = 'tb_pais';
    protected $fillable = ['nome','sigla'];
}
