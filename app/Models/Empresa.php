<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'actividad',
        'telefono',
        'correo',
        'representante',
        'telefono_representante',
        'correo_representante',
        'provincia',
        'municipio',
        'sector',
        'calle',
        'numero',
        'referencia',
    ];

    /**
     * Obtiene los datos de referencias personales
     */
    public function personal()
    {
        return $this->hasMany(Personal::class, 'empresa_id','id');
    }

    /**
     * Obtiene los datos de residencia.
     */
    public function usuario()
    {
        return $this->hasOne(User::class, 'empresa_id','id');
    }
}
