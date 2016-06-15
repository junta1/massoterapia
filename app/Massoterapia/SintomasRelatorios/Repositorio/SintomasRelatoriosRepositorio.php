<?php

namespace App\Massoterapia\SintomasRelatorios\Repositorio;

use App\Massoterapia\SintomasRelatorios\Model\SintomasRelatoriosModel;

class SintomasRelatoriosRepositorio
{

    protected $model;

    public function __construct(SintomasRelatoriosModel $model)
    {
        $this->model = $model;
    }

    public function all($input = null)
    {
        $campos = [
            'tb_sintomas_relatorios.id',
            'tb_sintomas.nome_sintomas',
            'tb_sintomas_relatorios.sintoma_resposta',
            'tb_cadastro_paciente.nome_pac',
            'tb_cadastro_paciente.cpf_pac',
            'tb_profissional.nome_profissional',
            'tb_cargo.nome_cargo',
            'tb_consulta.data_consulta',
            'tb_sintomas_relatorios.fk_sintomas_id',
            'tb_sintomas_relatorios.fk_consulta_id'
        ];

        $busca = $this->model->select($campos)
                ->join('tb_sintomas', 'tb_sintomas.id', '=', 'tb_sintomas_relatorios.fk_sintomas_id')
                ->join('tb_consulta', 'tb_consulta.id', '=', 'tb_sintomas_relatorios.fk_consulta_id')
                ->join('tb_cadastro_paciente', 'tb_cadastro_paciente.id', '=', 'tb_consulta.fk_cadastro_paciente_id')
                ->join('tb_profissional', 'tb_profissional.id', '=', 'tb_consulta.fk_profissional_id')
                ->join('tb_cargo', 'tb_cargo.id', '=', 'tb_profissional.fk_cargo_id')
                ->orderBy('tb_sintomas.nome_sintomas', 'asc')
                ->paginate(10);

        return $busca;
    }

    public function save(array $input)
    {
        $dados = [
            'sintoma_resposta' => $input['sintomaResposta'],
            'fk_sintomas_id' => $input['codSintomas'],
            'fk_consulta_id' => $input['codConsulta']
            ];
        
        return $this->model->create($dados);
    }
    
    public function getWhere(array $input)
    {
        $campos = [
            'tb_sintomas_relatorios.id',
            'tb_sintomas.nome_sintomas',
            'tb_sintomas_relatorios.sintoma_resposta',
            'tb_cadastro_paciente.nome_pac',
            'tb_cadastro_paciente.cpf_pac',
            'tb_profissional.nome_profissional',
            'tb_cargo.nome_cargo',
            'tb_consulta.data_consulta',
            'tb_sintomas_relatorios.fk_sintomas_id',
            'tb_sintomas_relatorios.fk_consulta_id'
        ];

        $busca = $this->model->select($campos)
                ->join('tb_sintomas', 'tb_sintomas.id', '=', 'tb_sintomas_relatorios.fk_sintomas_id')
                ->join('tb_consulta', 'tb_consulta.id', '=', 'tb_sintomas_relatorios.fk_consulta_id')
                ->join('tb_cadastro_paciente', 'tb_cadastro_paciente.id', '=', 'tb_consulta.fk_cadastro_paciente_id')
                ->join('tb_profissional', 'tb_profissional.id', '=', 'tb_consulta.fk_profissional_id')
                ->join('tb_cargo', 'tb_cargo.id', '=', 'tb_profissional.fk_cargo_id')
                ->orderBy('tb_sintomas.nome_sintomas', 'asc');
        
        if (isset($input['idConsulta'])) {
            $busca = $busca->where('fk_consulta_id', '=', $input['idConsulta']);
        }
        
        if (isset($input['busca'])) {
            $busca = $busca->where('tb_cadastro_paciente.nome_pac', 'LIKE','%'. $input['busca']. '%');
        }

        return $busca->get();
    }

    public function find($id)
    {
        $campos = [
            'tb_sintomas_relatorios.id',
            'tb_sintomas.nome_sintomas',
            'tb_sintomas_relatorios.sintoma_resposta',
            'tb_cadastro_paciente.nome_pac',
            'tb_cadastro_paciente.cpf_pac',
            'tb_profissional.nome_profissional',
            'tb_cargo.nome_cargo',
            'tb_consulta.data_consulta',
            'tb_sintomas_relatorios.fk_sintomas_id',
            'tb_sintomas_relatorios.fk_consulta_id'
        ];

        $busca = $this->model->select($campos)
                ->join('tb_sintomas', 'tb_sintomas.id', '=', 'tb_sintomas_relatorios.fk_sintomas_id')
                ->join('tb_consulta', 'tb_consulta.id', '=', 'tb_sintomas_relatorios.fk_consulta_id')
                ->join('tb_cadastro_paciente', 'tb_cadastro_paciente.id', '=', 'tb_consulta.fk_cadastro_paciente_id')
                ->join('tb_profissional', 'tb_profissional.id', '=', 'tb_consulta.fk_profissional_id')
                ->join('tb_cargo', 'tb_cargo.id', '=', 'tb_profissional.fk_cargo_id')
                ->orderBy('tb_sintomas.nome_sintomas', 'asc')
                ->where('tb_sintomas_relatorios.id', '=', $id)
                ->first();

        return $busca;
    }
    
    public function update($id, array $input)
    {
        $relatorio = $this->model->find($id);
        $relatorio->sintoma_resposta = $input['sintomaResposta'];
        $relatorio->fk_sintomas_id = $input['codSintomas'];
        $relatorio->fk_consulta_id = $input['codConsulta'];
        
        return $relatorio->save();
    }
    
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}
