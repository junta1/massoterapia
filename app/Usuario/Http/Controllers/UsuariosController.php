<?php

namespace App\Usuario\Http\Controllers;

use App\Usuario\Model\UsuariosModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario\Usuario;
use App\Usuario\Http\Requests\UsuarioValidacao;

class UsuariosController extends Controller {

//    Criar um atributo do tipo protected
    protected $usuarios;

    public function __construct(Usuario $usuarios) {
        $this->usuarios = $usuarios;
    }

    public function index() {
        $usuarios = $this->usuarios->all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UsuarioValidacao $validacao ) {
        $this->usuarios->save($validacao->all());
        
        //Redireciona após a execuçã do inserir
        return redirect()->route('usuarios.index');
    }
    
    /*Inserir sem validar
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
        return view('usuarios.edit',  compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request) {
        $this->usuarios->update($id, $request->all());
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
