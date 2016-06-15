<?php

namespace App\Massoterapia\SintomasRelatorios\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\Consulta\Model\ConsultaModel;
use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel;

class SintomasRelatoriosModel extends Model
{
    protected $table = 'tb_sintomas_relatorios';
    protected $fillable = ['id','sintoma_resposta','fk_sintomas_id','fk_consulta_id'];
    public $timestamps = false;
        /**
        * hasone - um para um
        * obs: Não precisa de link relacionado a outra tabela.
        * Utiliza se na model que não tem Chave estrangeira
        * 
        * belongsto - Um para um
        * obs: Precisa de um link relacionado com a outra tabela.
        * Utiliza na model que tem chave estrangeira
        * 
        * hasmany - um para muitos
        * belonstomany - muitos para muitos
        */
    
    public function Consulta()
    {
        return $this->belongsTo(ConsultaModel::class);
    }
    
    public function SintomaTipo()
    {
        return $this->belongsTo(SintomaTipoModel::class);
    }
}
