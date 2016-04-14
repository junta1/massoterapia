<?php

namespace App\Usuario\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario\Model\UsuariosModel;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Usuario\Usuario;

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
    public function store(Request $request) {
        $this->usuarios->save($request->all());
        
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UsuarioValidacao $request) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        
    }

}
