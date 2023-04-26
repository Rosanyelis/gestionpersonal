<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificadoIntegridadLaboral extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'certificado_procuraduria',
        'resultadop',
        'detallep',
        'certificado_institucion',
        'resultadoi',
        'detallei',
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
}
