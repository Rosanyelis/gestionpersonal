<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa_id',
        'name',
        'email',
        'password',
        'tipo',
        'empresa',
        'logo',
        'actividad',
        'telefono_empresa',
        'correo_empresa',
        'representante',
        'telefono_representante',
        'correo_representante',
        'provincia',
        'municipio',
        'sector',
        'calle',
        'numero',
        'referencia',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'flota',
        'cargo',
        'correo_personal'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
     * Obtiene los datos de la empresa.
     */
    public function reportes()
    {
        return $this->hasMany(ReporteActividadNoProcesada::class, 'user_id', 'id');
    }

      /**
     * Obtiene los datos de la empresa.
     */
    public function candidatos()
    {
        return $this->hasMany(Personal::class, 'user_id', 'id');
    }
}
