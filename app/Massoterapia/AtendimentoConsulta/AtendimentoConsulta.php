<?php
namespace App\Massoterapia\AtendimentoConsulta;

use App\Massoterapia\Consulta\Consulta;
use App\Massoterapia\PacienteCadastro\PacienteCadastro;
use App\Massoterapia\Profissional\Profissional;
use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel as SintomaModel;
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
class AtendimentoConsulta
{
    public function find($id)
    {
        $nConsulta = new Consulta();
        $consulta = $nConsulta->find($id);
        
        $nPaciente = new PacienteCadastro();
        $paciente = $nPaciente->find($consulta->idPaciente);
        
        $nProfissional = new Profissional();
        $profissional = $nProfissional->find($consulta->idProfissional);
        
        $sintomas = SintomaModel::all();
        
        return compact('consulta', 'paciente', 'profissional', 'sintomas');
    }
    
    public function save(array $input)
    {
        foreach ($input['resposta'] as $key => $r) {
            $nRelatorioSintoma = new SintomasRelatorios();
        
            $salvar = $nRelatorioSintoma->save([
                'sintomaResposta' => $r,
                'codSintomas' => $key,
                'codConsulta' => $input['idConsulta']
            ]);
        }
        
        return true;
    }
}
