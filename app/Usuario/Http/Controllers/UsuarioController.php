<?php

namespace App\Usuario\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario\Model\UsuariosModel;
use App\Usuario\Http\Requests;

class UsuarioController extends Controller
{
    public function create() {
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UsuarioValidacao $validacao) {
//      

    }

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
