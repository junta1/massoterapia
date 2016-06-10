<?php

namespace App\Massoterapia\Consulta\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\PacienteCadastro\Model\PacienteCadastroModel;

class ConsultaModel extends Model
{
    protected $table = 'tb_consulta';
    protected $fillable = ['data_consulta','fk_cadastro_paciente_id','fk_profissional_id'];
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
      
//      public function Paciente()
//      {
//          return $this->belongsToMany(PacienteCadastroModel::class);
//      }
//    public function Profissional()
//    {
//        return $this->belongsToMany();
//    }
}
