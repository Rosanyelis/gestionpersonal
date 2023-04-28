<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegridadLaboral extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'personal_id',
        'candidato_id',
        'certificado_procuraduria',
        'certificado_institucion',
        'actividad_antisocial',
        'reporte_actividad_noprocesada',
        'prueba_psicometrica',
        'enfermedades_contagiosas',
        'consumo_alcohol',
        'sustancia_prohibida',
        'visita_domiciliaria',
        'levantamiento_coordinado',
        'investigacion_entorno',
        'levantamiento_dactilar',
        'levantamiento_fotografia',
        'integridad_familiar',
        'resultado',
        'detalle',
    ];


    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los datos del personal.
     */
    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id', 'id');
    }
}
