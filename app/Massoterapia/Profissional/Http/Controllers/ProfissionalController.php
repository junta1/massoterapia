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
    
}
