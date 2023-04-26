<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'codigo',
        'cedula',
        'nombres',
        'apellidos',
        'apodo',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'estado_civil',
        'nacionalidad',
        'tipo_sangre'
    ];

     /**
     * Obtiene los datos de la empresa.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Obtiene los datos de residencia.
     */
    public function residencia()
    {
        return $this->hasOne(Residencia::class, 'personal_id','id');
    }


    /**
     * Obtiene los datos de referencias personales
     */
    public function referenciaspersonales()
    {
        return $this->hasMany(ReferenciasPersonalesFamiliares::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de referencias personales
     */
    public function datos_laborales()
    {
        return $this->hasOne(DatosLaboral::class, 'personal_id','id');
    }


    /**
     * Obtiene las enfermedades que posee.
     */
    public function enfermedades()
    {
        return $this->hasMany(Enfermedades::class, 'personal_id', 'id');
    }
    /**
     * Obtiene los contactos de emergencia
     */
    public function contactos_emergencia()
    {
        return $this->hasMany(ContactosEmergencia::class, 'personal_id', 'id');
    }
    /**
     * Obtiene los Medicamentos a los que es alergico.
     */
    public function alergia_medicamentos()
    {
        return $this->hasMany(AlergiaMedicamentos::class, 'personal_id', 'id');
    }
    /**
     * Obtiene los Cursos Tecnicos.
     */
    public function cursos_tecnicos()
    {
        return $this->hasMany(CursosTecnicos::class, 'personal_id', 'id');
    }
    /**
     * Obtiene los datos de Carreras Universitarias.
     */
    public function carreras_universitarias()
    {
        return $this->hasMany(CarrerasUniversitarias::class, 'personal_id', 'id');
    }
    /**
     * Obtiene los PHDS.
     */
    public function phd()
    {
        return $this->hasMany(Phd::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los Maestrias.
     */
    public function maestrias()
    {
        return $this->hasMany(Maestria::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los Maestrias.
     */
    public function talleres()
    {
        return $this->hasMany(Talleres::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los Maestrias.
     */
    public function diplomados()
    {
        return $this->hasMany(Diplomado::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los Maestrias.
     */
    public function participacion()
    {
        return $this->hasMany(Participacion::class, 'personal_id', 'id');
    }

    /**
     * Obtiene los datos de analitica de psicometria.
     */
    public function historial_laboral()
    {
        return $this->hasMany(HistorialLaboral::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de residencia.
     */
    public function integridad_laboral()
    {
        return $this->hasOne(CertificadoIntegridadLaboral::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de analitica de psicometria.
     */
    public function analisis_psicometria()
    {
        return $this->hasOne(AnaliticaPsicometria::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de levantamiento de campo.
     */
    public function levantamiento_campo()
    {
        return $this->hasOne(LevantamientoCampo::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de investigacion de leyes.
     */
    public function depuracion_leyes()
    {
        return $this->hasOne(InvestigacionDepuracionLeyes::class, 'personal_id','id');
    }

    /**
     * Obtiene los datos de referencias personales
     */
    public function actividad_noprocesada()
    {
        return $this->hasMany(ReporteActividadNoProcesada::class, 'personal_id','id');
    }
}
