<?php

namespace \Models;

use Illuminate\Database\Eloquent\Model;

class CadastroPacienteModel extends Model
{
    protected $table = 'tb_cadastro_paciente';
    
    protected $fillable = ['nome_pac','cpf_pac','cod_plano','email_pac','nasicmento_pac','sexo_pac','fk_endereco_id','fk_plano_id'];
    
    public function sintomas() {
        $this->belongsToMany(CategoriaModel::class);
    }
    
    public function medidas() {
        $this->belongsToMany(\App\Models\MedidasModel::class);
    }
//    public function salvarDadosDoPaciente(App\Library\ProdutoEntity $produto)
//    {
//        $input = [
//            'nome' => 'Ediaimo',
//            'idade' => 31
//        ];
//        
//        $user = new CategoriaModel($input);
//        $user->save();
//        
//        $user = new CategoriaModel();
//        $user->create($input);
//        
//        $user = new CategoriaModel();
//        $user->nome = $produto->getNome();
//        $user->idade = 31;
//        $user->save();
//        
//        
//    }
        
}
