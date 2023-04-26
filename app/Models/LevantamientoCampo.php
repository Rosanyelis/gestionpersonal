<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevantamientoCampo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'visita_domiciliaria',
        'resultadov',
        'detallev',
        'levantamiento_coordinado',
        'resultadol',
        'detallel',
        'investigacion_entorno',
        'resultadoi',
        'detallei',
        'levantamiento_dactilar',
        'resultadod',
        'detalled',
        'levantamiento_fotografia',
        'resultadof',
        'detallef',
        'integridad_familiar',
        'resultadofa',
        'detallefa',
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
}
