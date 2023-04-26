<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnaliticaPsicometria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'prueba_psicometrica',
        'resultadop',
        'detallep',
        'enfermedades_contagiosas',
        'resultadoi',
        'detallei',
        'consumo_alcohol',
        'resultadoa',
        'detallea',
        'sustancia_prohibida',
        'resultados',
        'detalles',
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
}
