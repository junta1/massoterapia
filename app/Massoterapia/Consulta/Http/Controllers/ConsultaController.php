<?php

namespace App\Massoterapia\Consulta\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Massoterapia\Consulta\Consulta;

class ConsultaController extends Controller
{
    protected $consultaNegocio;
    
    public function __construct(Consulta $consultaNegocio)
    {
        $this->consultaNegocio = $consultaNegocio;
    }
    
    public function index()
    {
        $consulta = $this->consultaNegocio->all();
        return view('consulta.index',compact('consulta'));
    }
    
    public function create()
    {
        return view('consulta.create');
    }
    
    public function store(Request $request)
    {
        $this->consultaNegocio->save($request->all());
        return redirect()->route('consulta.index');
    }
    
    public function edit($id)
    {
        $pacienteCadastro = $this->consultaNegocio->paciente($id);
        
        return view('consulta.edit', compact('pacienteCadastro'));
    }
    
    public function update()
    {
        
    }
}
