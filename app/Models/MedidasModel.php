<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedidasModel extends Model
{
    protected $table = 'tb_medidas';
    
    protected $fillable = ['nome_area_medida','unidade_medida'];
    
    public function cadastroPaciente() {
        $this->belongsToMany(MedidasModel::class);
    }
}
