<?php

namespace App\Http\Controllers;

use App\Models\AnaliticaPsicometria;
use App\Models\CandidatoExterno;
use App\Models\CertificadoIntegridadLaboral;
use App\Models\IntegridadLaboral;
use App\Models\InvestigacionDepuracionLeyes;
use App\Models\LevantamientoCampo;
use Illuminate\Http\Request;

class CandidatoExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CandidatoExterno::all();
        return view('candidatoExterno.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatoExterno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => ['required', 'min:10'],
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'fecha_nacimiento' => ['required'],
        ],
        [
            'cedula.required' => 'El campo Cédula es obligatorio',
            'cedula.min' => 'La Cédula debe tener mínimo 10 números',
            'nombres.required' => 'El campo Nombres es obligatorio',
            'apellidos.required' => 'El campo Apellidos es obligatorio',
            'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',
            'lugar_nacimiento.required' => 'El campo Lugar de Nacimiento es obligatorio',

        ]);

        $count = CandidatoExterno::where('cedula', $request->cedula)
                                    ->where('empresa', $request->empresa)
                                    ->count();
        if($count > 0){
            return redirect('candidatos-externos')->with('error', 'Ya existe un registro con la misma Cédula y Empresa');
        }

        $candidatoExterno = new CandidatoExterno();
        $candidatoExterno->cedula = $request->cedula;
        $candidatoExterno->nombres = $request->nombres;
        $candidatoExterno->apellidos = $request->apellidos;
        $candidatoExterno->fecha_nacimiento = $request->fecha_nacimiento;
        $candidatoExterno->empresa = $request->empresa;
        $candidatoExterno->sucursal = $request->sucursal;
        $candidatoExterno->autorizado = $request->autorizado;
        $candidatoExterno->detalle = $request->detalle;
        $candidatoExterno->save();

        return redirect('candidatos-externos')->with('success', 'Registro Guardado Exitósamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CandidatoExterno::where('id', $id)->first();
        return view('candidatoExterno.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CandidatoExterno::where('id', $id)->first();
        return view('candidatoExterno.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = CandidatoExterno::where('id', $id)->count();
        if ($count>0) {
            $request->validate([
                'cedula' => ['required', 'min:10'],
                'nombres' => ['required'],
                'apellidos' => ['required'],
                'fecha_nacimiento' => ['required'],
            ],
            [
                'cedula.required' => 'El campo Cédula es obligatorio',
                'cedula.min' => 'La Cédula debe tener mínimo 10 números',
                'nombres.required' => 'El campo Nombres es obligatorio',
                'apellidos.required' => 'El campo Apellidos es obligatorio',
                'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',

            ]);

            $candidatoExterno = CandidatoExterno::find($id);
            $candidatoExterno->cedula = $request->cedula;
            $candidatoExterno->nombres = $request->nombres;
            $candidatoExterno->apellidos = $request->apellidos;
            $candidatoExterno->fecha_nacimiento = $request->fecha_nacimiento;
            $candidatoExterno->empresa = $request->empresa;
            $candidatoExterno->sucursal = $request->sucursal;
            $candidatoExterno->autorizado = $request->autorizado;
            $candidatoExterno->detalle = $request->detalle;
            $candidatoExterno->save();

            return redirect('candidatos-externos')->with('success', 'Registro Actualizado Exitósamente');
        } else {
            return redirect('candidatos-externos')->with('error', 'No se encontró el registro');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function investigacionlaboral($id)
    {
        return view('candidatoExterno.certificaciones', compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecertificaciones(Request $request, $id)
    {
        $count = CandidatoExterno::where('id', $id)->count();
        if ($count>0) {

            $request->validate([
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
            $reg->candidato_id = $id;
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


            return redirect('/candidatos-externos')->with('success', 'Registro de Información Confidencial Guardado Exitósamente');

        } else {
            return redirect('/candidatos-externos')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }
}
