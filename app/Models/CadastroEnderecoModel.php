<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroEnderecoModel extends Model {

    protected $table = 'tb_cadastro_endereco';
    protected $fillable = ['tipo_endereco', 'endereco', 'complemento', 'cep', 'bairro', 'telefone', 'fk_pais_id'];
    
    public function pais() {
        $this->hasMany(PaisModel::class);
    }
}
