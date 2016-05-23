<?php

namespace App\Massoterapia\SintomaCategoria\Model;

use Illuminate\Database\Eloquent\Model;

class SintomaCategoriaModel extends Model {

    protected $table = 'tb_categoria';
    protected $fillable = ['nome_categoria'];

}
