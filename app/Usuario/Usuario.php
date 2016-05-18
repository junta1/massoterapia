<?php

namespace App\Usuario;

use App\Usuario\Repositorio\UsuariosRepositorio;

class Usuario {

    protected $repositorio;

    public function __construct(UsuariosRepositorio $model) {
        $this->repositorio = $model;
    }

    public function all() {
        return $this->repositorio->all();
    }
    
    public function selectItem($selectItem) {
        return $this->repositorio->selectItem($selectItem);
    }
    
    public function save($input) {
        $input['usuario'] = $this->tratarUsuario($input);
        return $this->repositorio->save($input);
    }

    /*    Quando o campo usuario estiver vazio, será feita a junção
     *    entre os dados do campo nome e sobrenome para formar e inserir
     *    no campo usuario.
     */

    protected function tratarUsuario($input) {
//        strtolower retorna string minuscula
//        $input['usuario'] é o campo usuario
        if ($input['usuario'] == null) {
            $input['usuario'] = strtolower($input['nome']) . strtolower($input['sobrenome']);
        }
        return $input['usuario'];
    }

    public function find($id) {
        return $this->repositorio->find($id);
    }

    public function update($id, $input) {
        if ($input['usuario'] == null) {
            $input['usuario'] = strtolower($input['nome']) . strtolower($input['sobrenome']);
        }
        return $this->repositorio->update($id, $input);
    }

    public function delete($id) {
        return $this->repositorio->delete($id);
    }

}
