<?php

namespace App\Usuario\Repositorio;

/**
 * Description of UsuarioRepositorio
 *
 * @author rafaelconceicao@conder.intranet
 */
use App\Usuario\Model\UsuariosModel;

class UsuariosRepositorio {

//    Criar um atributo do tipo protected
    protected $model;

//    Criar um construtor com parametro do tipo Model
    public function __construct(UsuariosModel $model) {
        $this->model = $model;
    }

//    Select de todos os campos
    public function all() {

        return $this->model->select('id', 'nome', 'sobrenome', 'usuario', 'email', 'created_at', 'updated_at')->get();
    }

//    Salvando dados com array
    public function save(array $input) {
//    Método create do model
        return $this->model->create($input);
    }
    
//    Select com base no id
    public function find($id) {
        return $this->model->find($id);
    }
    
    public function update($id, array $input) {
        
        $usuarios = $this->model->find($id);
        $usuarios->nome = $input['nome'];
        $usuarios->sobrenome = $input['sobrenome'];
        $usuarios->email = $input['email'];
        $usuarios->usuario = $input['usuario'];
        
        if (isset($input['senha'])) {
            $usuarios->senha = $input['senha'];
        }
        
        return $usuarios->save();
    }
    
    public function delete($id) {
        return $this->model->destroy($id);
    }
}
