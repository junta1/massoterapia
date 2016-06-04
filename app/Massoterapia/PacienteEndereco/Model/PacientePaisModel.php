<?php

namespace App\Massoterapia\PacienteEndereco\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\PacienteEndereco\Model\PacienteEnderecoModel;

class PacientePaisModel extends Model
{
    protected $table = 'tb_pais';
    protected $fillable = ['nome','sigla'];
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
    
    public function PacienteEstado()
    {
        $this->hasMany(PacienteEstadoModel::class);
    }
}
