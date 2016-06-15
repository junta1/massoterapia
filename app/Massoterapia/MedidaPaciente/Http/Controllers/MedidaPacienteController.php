<?php

namespace App\Massoterapia\MedidaPaciente\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Massoterapia\MedidaPaciente\MedidaPaciente;
use App\Massoterapia\MedidaPaciente\Http\Validacao\MedidaPacienteValidacao;

class MedidaPacienteController extends Controller
{
    protected $medidaNegocio;

    public function __construct(MedidaPaciente $medidaNegocio)
    {
        $this->middleware('auth');
        $this->medidaNegocio = $medidaNegocio;
    }

    public function index()
    {
        $medidaNegocio = $this->medidaNegocio->all();
        
        return view('medidapaciente.index', compact('medidaNegocio'));
    }

    public function create()
    {
        return view('medidapaciente.create');
    }

    public function store(MedidaPacienteValidacao $medida)
    {
        $this->medidaNegocio->save($medida->all());
        return redirect()->route('medida-paciente.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $medidaNegocio = $this->medidaNegocio->find($id);
        return view('medidapaciente.edit', compact('medidaNegocio'));
    }
    
    public function update($id, MedidaPacienteValidacao $medida)
    {
        $this->medidaNegocio->update($id, $medida->all());
        return redirect()->route('medida-paciente.index');
    }

    public function destroy($id)
    {
        $this->medidaNegocio->delete($id);
        return redirect()->route('medida-paciente.index');
    }
    //Pendente
    public function search(Request $request)
    {
        $input = $request->all();
        $medidaNegocio = $this->medidaNegocio->all($input);
        return view('medidapaciente.index', compact('medidaNegocio'));
    }
}
