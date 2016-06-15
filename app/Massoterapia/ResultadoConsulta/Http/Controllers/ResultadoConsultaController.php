<?php
namespace App\Massoterapia\ResultadoConsulta\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Massoterapia\ResultadoConsulta\ResultadoConsulta;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoConsultaController
 *
 * @author rafaelconceicao@conder.intranet
 */
class ResultadoConsultaController extends Controller
{
    protected $consulta;
    
    public function __construct(ResultadoConsulta $consulta)
    {
        $this->consulta = $consulta;
    }

    public function getIndex($id)
    {
        $consulta = $this->consulta->find($id);
        
        return view('resultado.index', compact('consulta'));
    }
}
