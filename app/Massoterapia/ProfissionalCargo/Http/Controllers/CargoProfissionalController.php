<?php

namespace App\Massoterapia\ProfissionalCargo\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Massoterapia\ProfissionalCargo\CargoProfissional;
use App\Massoterapia\ProfissionalCargo\Http\Validacao\CargoProfissionalValidacao;

class CargoProfissionalController extends Controller
{
    protected $cargoNegocio;
    
    public function __construct(CargoProfissional $cargoNegocio)
    {
        $this->cargoNegocio = $cargoNegocio;
    }
    
    public function index()
    {
        $cargo = $this->cargoNegocio->all();
        return view('profissionalcargo.index', compact('cargo'));
    }
    
    public function create()
    {
        return view('profissionalcargo.create');
    }
    
    public function store(CargoProfissionalValidacao $validacao)
    {
        $this->cargoNegocio->save($validacao->all());
        //Redireciona após a execuçã do inserir
        return redirect()->route('profissional-cargo.index');
    }
    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $cargo = $this->cargoNegocio->find($id);
        return view('profissionalcargo.edit', compact('cargo'));
    }
    
    public function update($id, CargoProfissionalValidacao $validacao)
    {
        $this->cargoNegocio->update($id, $validacao->all());
        return redirect()->route('profissional-cargo.index');
    }
    
    public function delete($id)
    {
        $this->cargoNegocio->delete($id);
        return redirect()->route('profissional-cargo.index');
    }
    
    public function search(Request $request)
    {
        $input = $request->all();
        $cargo = $this->cargoNegocio->all($input);
        return view('profissionalcargo.index', compact('cargo'));
    }
}
