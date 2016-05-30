<?php

namespace App\Massoterapia\SintomaTipo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Massoterapia\SintomaTipo\SintomaTipo;

class SintomaTipoController extends Controller
{
    protected $sintomaTipoNegocio;
    
    public function __construct(SintomaTipo $sintomaTipoNegocio)
    {
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
    public function store(Request $request) 
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
        $sintomaTipo = $this->sintomaTipoNegocio->find($id);
        return view('sintomatipo.edit', compact('sintomaTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request) 
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
        
    }
}
