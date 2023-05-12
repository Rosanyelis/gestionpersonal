<?php

namespace App\Http\Controllers;

use App\Models\IntegridadLaboral;
use App\Models\Personal;
use Illuminate\Http\Request;

class IntegridadLaboralController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('prueba.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {

            $request->validate([
                'fecha' => ['required', 'date'],
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
                'resultado' => ['required'],
            ],
            [
                'fecha.required' => 'La fecha es obligatoria',
                'certificado_procuraduria.required' => 'La respuesta de Certificado de Procuraduría es obligatoria',
                'certificado_institucion.required' => 'La respuesta de Certificado de Institución es obligatoria',
                'actividad_antisocial.required' => 'La respuesta de Actividad Antisocial es obligatoria',
                'reporte_actividad_noprocesada.required' => 'La respuesta de Reporte de Actividad No Procesada es obligatoria',
                'prueba_poligrafica.required' => 'La respuesta de Prueba Poligráfica es obligatoria',
                'prueba_psicometrica.required' => 'La respuesta de Prueba Psicométrica es obligatoria',
                'enfermedades_contagiosas.required' => 'La respuesta de Enfermedades Contagiosas es obligatoria',
                'consumo_alcohol.required' => 'La respuesta de Consumo de Alcohol es obligatoria',
                'sustancia_prohibida.required' => 'La respuesta de Sustancia Prohibida es obligatoria',
                'visita_domiciliaria.required' => 'La respuesta de Visita Domiciliaria es obligatoria',
                'levantamiento_coordinado.required' => 'La respuesta de Levantamiento Coordinado es obligatoria',
                'investigacion_entorno.required' => 'La respuesta de Investigación de Entorno es obligatoria',
                'levantamiento_dactilar.required' => 'La respuesta de Levantamiento Dactilar es obligatoria',
                'levantamiento_fotografia.required' => 'La respuesta de Levantamiento Fotográfico es obligatoria',
                'integridad_familiar.required' => 'La respuesta de Integridad Familiar es obligatoria',
                'resultado.required' => 'La respuesta de Resultado es obligatoria',
            ]);

            $reg = new IntegridadLaboral();
            $reg->personal_id = $id;
            $reg->fecha = $request->fecha;
            $reg->certificado_procuraduria = $request->certificado_procuraduria;
            $reg->certificado_institucion = $request->certificado_institucion;
            $reg->actividad_antisocial = $request->actividad_antisocial;
            $reg->reporte_actividad_noprocesada = $request->reporte_actividad_noprocesada;
            $reg->prueba_poligrafica = $request->prueba_poligrafica;
            $reg->prueba_psicometrica = $request->prueba_psicometrica;
            $reg->enfermedades_contagiosas = $request->enfermedades_contagiosas;
            $reg->consumo_alcohol = $request->consumo_alcohol;
            $reg->sustancia_prohibida = $request->sustancia_prohibida;
            $reg->visita_domiciliaria = $request->visita_domiciliaria;
            $reg->levantamiento_coordinado = $request->levantamiento_coordinado;
            $reg->investigacion_entorno = $request->investigacion_entorno;
            $reg->levantamiento_dactilar = $request->levantamiento_dactilar;
            $reg->levantamiento_fotografia = $request->levantamiento_fotografia;
            $reg->integridad_familiar = $request->integridad_familiar;
            $reg->resultado = $request->resultado;
            $reg->detalle = $request->detalle;
            $reg->save();


            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Información Confidencial Guardado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntegridadLaboral  $integridadLaboral
     * @return \Illuminate\Http\Response
     */
    public function show($id, $prueba_id)
    {
        $data = IntegridadLaboral::where('id', $prueba_id)->first();
        return view('prueba.show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IntegridadLaboral  $integridadLaboral
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $prueba_id)
    {
        $data = IntegridadLaboral::find($prueba_id);
        return view('prueba.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IntegridadLaboral  $integridadLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $prueba_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $reg = IntegridadLaboral::where('personal_id', $id)->where('id', $prueba_id)->first();
            $reg->fecha = $request->fecha;
            $reg->certificado_procuraduria = $request->certificado_procuraduria;
            $reg->certificado_institucion = $request->certificado_institucion;
            $reg->actividad_antisocial = $request->actividad_antisocial;
            $reg->reporte_actividad_noprocesada = $request->reporte_actividad_noprocesada;
            $reg->prueba_poligrafica = $request->prueba_poligrafica;
            $reg->prueba_psicometrica = $request->prueba_psicometrica;
            $reg->enfermedades_contagiosas = $request->enfermedades_contagiosas;
            $reg->consumo_alcohol = $request->consumo_alcohol;
            $reg->sustancia_prohibida = $request->sustancia_prohibida;
            $reg->visita_domiciliaria = $request->visita_domiciliaria;
            $reg->levantamiento_coordinado = $request->levantamiento_coordinado;
            $reg->investigacion_entorno = $request->investigacion_entorno;
            $reg->levantamiento_dactilar = $request->levantamiento_dactilar;
            $reg->levantamiento_fotografia = $request->levantamiento_fotografia;
            $reg->integridad_familiar = $request->integridad_familiar;
            $reg->resultado = $request->resultado;
            $reg->detalle = $request->detalle;
            $reg->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntegridadLaboral  $integridadLaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntegridadLaboral $integridadLaboral)
    {
        //
    }
}
