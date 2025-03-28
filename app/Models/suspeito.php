<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class suspeito extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'documento',
        'tem_tatuagem',
        'qual_tatuagem',
        'tem_deficiencia',
        'qual_deficiencia',
        'cor_raca',
        'tem_passagem',
        'foto',
        'obs',
    ];

    // No modelo Suspeito
public function getDataNascimentoAttribute($value)
{
    return \Carbon\Carbon::parse($value)->format('d/m/Y');
}

}
