<?php
namespace App\Massoterapia\AtendimentoConsulta\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Massoterapia\AtendimentoConsulta\AtendimentoConsulta;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtendimentoConsultaController
 *
 * @author rafaelconceicao@conder.intranet
 */
class AtendimentoConsultaController extends Controller
{
    protected $consulta;
    
    public function __construct(AtendimentoConsulta $consulta)
    {
        $this->consulta = $consulta;
    }

    public function getIndex($id)
    {
        $consulta = $this->consulta->find($id);
        
        return view('consulta.atender', compact('consulta'));
    }
    
    public function postIndex()
    {
        $salvar = $this->consulta->save(request()->input());
        
        if ($salvar) {
            return redirect()->route('consulta.index');
        }
    }
}
