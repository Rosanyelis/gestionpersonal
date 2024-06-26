<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatoExterno extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

/**
     * Obtiene los datos de residencia.
     */
    public function integridad_laboral()
    {
        return $this->hasMany(IntegridadLaboral::class, 'candidato_id','id');
    }

}
