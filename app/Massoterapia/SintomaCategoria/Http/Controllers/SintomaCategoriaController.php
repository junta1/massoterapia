<?php

namespace App\Massoterapia\SintomaCategoria\Http\Controllers;

use Illuminate\Http\Request;
use App\Massoterapia\SintomaCategoria\Http\Validacao\SintomaCategoriaValidacao;
use App\Http\Controllers\Controller;
use App\Massoterapia\SintomaCategoria\SintomaCategoria;

class SintomaCategoriaController extends Controller {

    protected $sintomaCategoria;

    public function __construct(SintomaCategoria $sintomaCategoria) {
        $this->sintomaCategoria = $sintomaCategoria;
    }

    public function index() {
        $sintomaCategoria = $this->sintomaCategoria->all();
        return view('sintomacategoria.index', compact('sintomaCategoria'));
    }

    public function create() {
        return view('sintomacategoria.create');
    }

    /**
     * Salva os dados no banco e faz a validação dos campos.
     *
     * @return Response
     */
    public function store(SintomaCategoriaValidacao $request) {
        $this->sintomaCategoria->save($request->all());

        //Redireciona após a execuçã do inserir
        return redirect()->route('sintoma-categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $sintomaCategoria = $this->sintomaCategoria->find($id);
        return view('sintomacategoria.edit', compact('sintomaCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, SintomaCategoriaValidacao $request) {
        $this->sintomaCategoria->update($id, $request->all());
        return redirect()->route('sintoma-categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $this->sintomaCategoria->delete($id);
        return redirect()->route('sintoma-categoria.index');
    }

}
