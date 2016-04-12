<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model {

    protected $table = 'usuarios';
    protected $fillable = ['nome', 'sobrenome', 'email', 'usuario', 'senha'];

}
