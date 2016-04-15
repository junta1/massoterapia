<?php

namespace App\Usuario\Http\Controllers;

//use App\Usuario\Model\UsuariosModel;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario\Usuario;
use App\Usuario\Http\Requests\UsuarioValidacao;


class UsuariosController extends Controller {

//    Criar um atributo do tipo protected.
    protected $usuarios;

//    Criar construtor do tipo usuario, tendo acesso aos demais métodos.
    public function __construct(Usuario $usuarios) {
        $this->usuarios = $usuarios;
    }

//    Serão listados todos os valores dos campos da tabela usuario.
    public function index() {
        $usuarios = $this->usuarios->all();
        return view('usuarios.index', compact('usuarios'));
    }

//    Cria o link para o html de cadastro de usuario.
    public function create() {
        return view('usuarios.create');
    }

    /**
     * Salva os dados no banco e faz a validação dos campos.
     *
     * @return Response
     */
    public function store(UsuarioValidacao $validacao) {

        $this->usuarios->save($validacao->all());

        //Redireciona após a execuçã do inserir
        return redirect()->route('usuarios.index');
    }
    
    /* Inserir sem validar
      public function store(Request $request) {
      $this->usuarios->save($request->all());
      }
     */

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $usuarios = $this->usuarios->find($id);
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UsuarioValidacao $validacaoUp) {
        $this->usuarios->update($id, $validacaoUp->all());
        return redirect()->route('usuarios.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $this->usuarios->delete($id);
        return redirect()->route('usuarios.index');
    }

}
