<?php

namespace App\Massoterapia\Profissional\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Massoterapia\Profissional\Profissional;
use App\Massoterapia\Profissional\Http\Validacao\ProfissionalValidacao;

class ProfissionalController extends Controller
{
    protected $negocio;
    
    public function __construct(Profissional $negocio)
    {
        $this->negocio = $negocio;
    }
    
    public function index()
    {
        $profissional = $this->negocio->all();
        return view('profissional.index', compact('profissional'));
    }
    
    public function create()
    {
        $cargo = $this->negocio->cargoAll();
        return view('profissional.create', compact('cargo'));
    }
    
    public function store(ProfissionalValidacao $validacao)
    {
        $this->negocio->save($validacao->all());
        return redirect()->route('profissional.index');
    }
    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $cargo = $this->negocio->cargoAll();
        $profissional = $this->negocio->find($id);
        
        return view('profissional.edit', compact('profissional','cargo'));
    }
    
    public function update(ProfissionalValidacao $validacao)
    {
        $this->negocio->update($id, $validacao->all());
        return redirect()->route('profissional.index');
    }
    
    public function destroy($id)
    {
        $this->negocio->delete($id);
        return redirect()->route('profissional.index');
    }
}
