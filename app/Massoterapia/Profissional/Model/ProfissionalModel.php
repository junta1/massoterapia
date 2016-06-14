<?php

namespace App\Massoterapia\Profissional\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\ProfissionalCargo\Model\CargoProfissionalModel;

class ProfissionalModel extends Model
{
    protected $table = 'tb_profissional';
    protected $fillable = ['id','nome_profissional','sexo','telefone','fk_Cargo_id'];
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
    
       public function ProfissionalCargo()
       {
           return $this->belongsTo(CargoProfissionalModel::class);
       }
}

