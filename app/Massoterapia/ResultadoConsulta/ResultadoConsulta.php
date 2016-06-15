<?php
namespace App\Massoterapia\ResultadoConsulta;

use App\Massoterapia\Consulta\Consulta;
use App\Massoterapia\PacienteCadastro\PacienteCadastro;
use App\Massoterapia\Profissional\Profissional;
use App\Massoterapia\SintomasRelatorios\SintomasRelatorios;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoConsulta
 *
 * @author rafaelconceicao@conder.intranet
 */
class ResultadoConsulta
{
    public function find($id)
    {
        $nConsulta = new Consulta();
        $consulta = $nConsulta->find($id);
        
        $nPaciente = new PacienteCadastro();
        $paciente = $nPaciente->find($consulta->idPaciente);
        
        $nProfissional = new Profissional();
        $profissional = $nProfissional->find($consulta->idProfissional);
        
        $nRespostaSintomas = new SintomasRelatorios();
        $respostas = $nRespostaSintomas->all(['idConsulta' => $id]);
        
        return compact('consulta', 'paciente', 'profissional', 'respostas');
    }
}
