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
    
}
