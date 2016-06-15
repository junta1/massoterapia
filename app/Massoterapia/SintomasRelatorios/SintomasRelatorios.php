<?php

namespace App\Massoterapia\SintomasRelatorios;

use App\Massoterapia\SintomasRelatorios\Repositorio\SintomasRelatoriosRepositorio;
use App\Massoterapia\SintomasRelatorios\Model\SintomasRelatoriosModel;

class SintomasRelatorios
{

    protected $repositorio;

    public function __construct()
    {
        $this->repositorio = new SintomasRelatoriosRepositorio(new SintomasRelatoriosModel);
    }

    public function all($input = null)
    {
        if (!is_null($input)) {
            return $this->repositorio->getWhere($input);
        }

        return $this->repositorio->all();
    }
    
    public function save(array $input)
    {
        return $this->repositorio->save($input);
    }
    
    public function find($id)
    {
        $input = $this->repositorio->find($id);
        $relatorio = new \stdClass();
        $relatorio->sintomaResposta = $input['sintoma_resposta'];
        $relatorio->codSintomas = $input['fk_sintomas_id'];
        $relatorio->codConsulta = $input['fk_consulta_id'];
        
        return $relatorio;
    }
    
    public function update($id, array $input)
    {
        return $this->repositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->repositorio->delete($id);
    }

}
