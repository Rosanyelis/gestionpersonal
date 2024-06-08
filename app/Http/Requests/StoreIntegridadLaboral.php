<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntegridadLaboral extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fecha' => ['required'],
            'empresa' => ['required'],
            'sucursal' => ['required'],
            'autorizado' => ['required'],
            'correo_autorizado' => ['required'],
            'certificado_procuraduria' => ['required'],
            'certificado_institucion' => ['required'],
            'actividad_antisocial' => ['required'],
            'reporte_actividad_noprocesada' => ['required'],
            'prueba_poligrafica' => ['required'],
            'prueba_psicometrica' => ['required'],
            'enfermedades_contagiosas' => ['required'],
            'consumo_alcohol' => ['required'],
            'sustancia_prohibida' => ['required'],
            'visita_domiciliaria' => ['required'],
            'levantamiento_coordinado' => ['required'],
            'investigacion_entorno' => ['required'],
            'levantamiento_dactilar' => ['required'],
            'levantamiento_fotografia' => ['required'],
            'integridad_familiar' => ['required'],
            'detalle_final' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'fecha.required' => 'Este campo es obligatorio.',
            'empresa.required' => 'Este campo es obligatorio.',
            'sucursal.required' => 'Este campo es obligatorio.',
            'autorizado.required' => 'Este campo es obligatorio.',
            'correo_autorizado.required' => 'Este campo es obligatorio.',
            'certificado_procuraduria.required' => 'Este campo es obligatorio.',
            'certificado_institucion.required' => 'Este campo es obligatorio.',
            'actividad_antisocial.required' => 'Este campo es obligatorio.',
            'reporte_actividad_noprocesada.required' => 'Este campo es obligatorio.',
            'prueba_poligrafica.required' => 'Este campo es obligatorio.',
            'prueba_psicometrica.required' => 'Este campo es obligatorio.',
            'enfermedades_contagiosas.required' => 'Este campo es obligatorio.',
            'consumo_alcohol.required' => 'Este campo es obligatorio.',
            'sustancia_prohibida.required' => 'Este campo es obligatorio.',
            'visita_domiciliaria.required' => 'Este campo es obligatorio.',
            'levantamiento_coordinado.required' => 'Este campo es obligatorio.',
            'investigacion_entorno.required' => 'Este campo es obligatorio.',
            'levantamiento_dactilar.required' => 'Este campo es obligatorio.',
            'levantamiento_fotografia.required' => 'Este campo es obligatorio.',
            'integridad_familiar.required' => 'Este campo es obligatorio.',
            'detalle_final.required' => 'Este campo es obligatorio.',
        ];
    }
}
