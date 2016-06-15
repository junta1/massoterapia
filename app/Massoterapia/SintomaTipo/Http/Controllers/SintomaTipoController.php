<?php

namespace App\Massoterapia\SintomaTipo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Massoterapia\SintomaTipo\SintomaTipo;
use App\Massoterapia\SintomaTipo\Http\Validacao\SintomaTipoValidacao;

class SintomaTipoController extends Controller
{
    protected $sintomaTipoNegocio;
    
    public function __construct(SintomaTipo $sintomaTipoNegocio)
    {
        $this->middleware('auth');
        $this->sintomaTipoNegocio = $sintomaTipoNegocio;
    }

    public function index()
    {
        $sintomaTipo = $this->sintomaTipoNegocio->all();
        return view('sintomatipo.index', compact('sintomaTipo'));
    }
       
    public function create() 
    {
        $categoria = $this->sintomaTipoNegocio->allCategoria();
        return view('sintomatipo.create', compact('categoria'));
    }

    /**
     * Salva os dados no banco e faz a validação dos campos.
     *
     * @return Response
     */
    public function store(SintomaTipoValidacao $request) 
    {
        $this->sintomaTipoNegocio->save($request->all());
        return redirect()->route('sintoma-tipo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) 
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) 
    {
        $categoria = $this->sintomaTipoNegocio->allCategoria();
        $sintomaTipo = $this->sintomaTipoNegocio->find($id);
        return view('sintomatipo.edit', compact('sintomaTipo','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, SintomaTipoValidacao $request) 
    {
        $this->sintomaTipoNegocio->update($id, $request->all());
        return redirect()->route('sintoma-tipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $this->sintomaTipoNegocio->delete($id);
        return redirect()->route('sintoma-tipo.index');
    }
}
