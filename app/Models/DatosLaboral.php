<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosLaboral extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'estatus_laboral',
        'disponibilidad',
        'rango_hora',
        'cantidad_hora',
        'nombre_labor',
        'empresa',
        'jefe_inmediato',
        'telefono',
        'anos',
        'empresa_old',
        'jefe_inmediato_old',
        'telefono_old',
        'anos_old',
        'tecnica',
        'profesional',
        'tiempo_experiencia',
        'detalle',
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
}
