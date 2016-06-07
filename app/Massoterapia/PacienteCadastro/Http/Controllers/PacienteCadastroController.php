<?php

namespace App\Massoterapia\PacienteCadastro\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Massoterapia\PacienteCadastro\PacienteCadastro;
use App\Massoterapia\PacienteCadastro\Http\Validacao\PacienteCadastroValidacao;

class PacienteCadastroController extends Controller
{

    protected $pacienteCadastroNegocio;

    public function __construct(PacienteCadastro $pacienteCadastroNegocio)
    {
        $this->pacienteCadastroNegocio = $pacienteCadastroNegocio;
    }

    public function index(Request $request)
    {
        $pacienteCadastro = $this->pacienteCadastroNegocio->all();
        
        return view('pacientecadastro.index', compact('pacienteCadastro'));
    }

    public function create()
    {
        return view('pacientecadastro.create');
    }

    public function store(PacienteCadastroValidacao $paciente)
    {
        $this->pacienteCadastroNegocio->save($paciente->all());
        return redirect()->route('paciente-cadastro.index');
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
}
