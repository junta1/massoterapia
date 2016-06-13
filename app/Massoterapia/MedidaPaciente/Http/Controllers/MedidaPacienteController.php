<?php

namespace App\Massoterapia\MedidaPaciente\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Massoterapia\MedidaPaciente\MedidaPaciente;

class MedidaPacienteController extends Controller
{
    protected $medidaNegocio;

    public function __construct(MedidaPaciente $medidaNegocio)
    {
        $this->medidaNegocio = $medidaNegocio;
    }

    public function index()
    {
        $medidaNegocio = $this->medidaNegocio->all();
        
        return view('medidaspaciente.index', compact('medidaNegocio'));
    }

    public function create()
    {
        return view('medidaspaciente.create');
    }

    public function store(Request $request)
    {
        $this->medidaNegocio->save($request->all());
        return redirect()->route('medida-paciente.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $pacienteCadastro = $this->pacienteCadastroNegocio->find($id);
        return view('pacientecadastro.edit', compact('pacienteCadastro'));
    }

    public function update($id, PacienteCadastroValidacao $paciente)
    {
        $this->pacienteCadastroNegocio->update($id, $paciente->all());
        return redirect()->route('paciente-cadastro.index');
    }

    public function destroy($id)
    {
        $this->pacienteCadastroNegocio->delete($id);
        return redirect()->route('paciente-cadastro.index');
    }
    
    public function search(Request $request)
    {
        $input = $request->all();
        $pacienteCadastro = $this->pacienteCadastroNegocio->all($input);
        return view('pacientecadastro.index', compact('pacienteCadastro'));
    }
}
