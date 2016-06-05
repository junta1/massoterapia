<?php

namespace App\Massoterapia\PacienteCadastro\Model;

use Illuminate\Database\Eloquent\Model;

class PacienteCadastroModel extends Model
{
    protected $table = 'tb_cadastro_paciente';
    protected $fillable = ['nome_pac','cpf_pac','email_pac','nascimento_pac','sexo_pac'];
    
    
}
