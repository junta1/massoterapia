<?php

namespace App\Massoterapia\SintomaCategoria\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel;

class SintomaCategoriaModel extends Model {

    protected $table = 'tb_sintomas_categoria';
    protected $fillable = ['nome_categoria'];
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
    
    public function SintomaTipo()
    {
        return $this->hasMany(SintomaTipoModel::class);
    }

}
