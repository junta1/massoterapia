<?php

namespace App\Massoterapia\SintomaTipo\Model;

use Illuminate\Database\Eloquent\Model;

class SintomaTipoModel extends Model
{
    protected $table = 'tb_sintomas';
    protected $fillable = ['nome_sintomas','fk_categoria_id'];
    
    //O Sintoma Tipo possui apenas uma categoria
    public function SintomaCategoria()
    {
        $this->belongsTo(SintomaTipoModel::class);
    }
}
