<?php

namespace App\Massoterapia\SintomaTipo\Model;

use Illuminate\Database\Eloquent\Model;
use App\Massoterapia\SintomaCategoria\Model\SintomaCategoriaModel;

class SintomaTipoModel extends Model
{
    protected $table = 'tb_sintomas';
    protected $fillable = ['nome_sintomas','fk_categoria_id'];
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
    
    //O Sintoma Tipo possui apenas uma categoria
    public function SintomaCategoria()
    {
        return $this->belongsTo(SintomaCategoriaModel::class);
    }
}
