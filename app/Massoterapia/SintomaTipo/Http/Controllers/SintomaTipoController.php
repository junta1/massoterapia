<?php

namespace App\Massoterapia\SintomaTipo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
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
       
    public function create() {
        return view('sintomatipo.create');
    }

    /**
     * Salva os dados no banco e faz a validação dos campos.
     *
     * @return Response
     */
    public function store(Request $request) {
        
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request) {
       
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