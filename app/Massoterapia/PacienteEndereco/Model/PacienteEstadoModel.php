<?php

namespace App\Massoterapia\PacienteEndereco\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\PacienteEndereco\Model\PacientePaisModel;
use App\Massoterapia\PacienteEndereco\Model\PacienteCidadeModel;

class PacienteEstadoModel extends Model
{
    protected $table = 'tb_estado';
    protected $fillable = ['nome','uf','fk_pais_id'];
    protected $timestamp = false;
    
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
    
    public function PacientePais() 
    {
        $this->hasOne(PacientePaisModel::class);
    }
    
    public function PacienteCidade()
    {
        $this->hasMany(PacienteCidadeModel::class);
    }
    
}
