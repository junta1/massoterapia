<?php

namespace App\Massoterapia\ProfissionalCargo\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\Profissional\Model\ProfissionalModel;

class CargoProfissionalModel extends Model
{
    protected $table = 'tb_cargo';
    protected $fillable = ['id','nome_cargo'];
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
    
    public function Profissional()
    {
        return $this->hasMany(ProfissionalModel::class);
    }
}
