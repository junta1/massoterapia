<?php

/**
 * Description of Usuario
 *
 * @author rafaelconceicao@conder.intranet
 */

use App\Usuario\Repositorio\UsuariosRepositorio;

class Usuario {

    protected $repositorioUsuario;
    
    public function __construct(UsuariosRepositorio $model) {
        $this->repositorioUsuario = $model;
    }
    
    public function all() {
        return $this->repositorioUsuario->all();
    }
    
    
}
