<?php

namespace App\Massoterapia\SintomaCategoria\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SintomaCategoriaController extends Controller
{
    protected $sintomaCategoria;

//    public function __construct( $sintomaCategoria) {
//        $this->sintomaCategoria = $sintomaCategoria;
//    }

    public function index() {
       return view('sintomacategoria.index', compact('sintomacategoria'));
    }
    
    public function create() {
       return view('sintomacategoria.create', compact('sintomacategoria'));
    }

    /**
     * Salva os dados no banco e faz a validação dos campos.
     *
     * @return Response
     */
    public function store(UsuarioValidacao $validacao) {

       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id, Request $selectItem) {

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
    public function update($id, UsuarioValidacao $validacaoUp) {
       
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