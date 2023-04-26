<?php

namespace App\Http\Controllers;

use App\Models\DatosLaboral;
use App\Models\Personal;
use Illuminate\Http\Request;

class DatosLaboralController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('estatus-laboral.create', compact('id'));
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
            // dd($request);
            $request->validate([
                'estatus_laboral' => ['required'],
                'disponibilidad' => ['required'],
                'rango_hora' => ['required'],
                'cantidad_hora' => ['required'],
                'tecnica' => ['required'],
                'profesional' => ['required'],
                'tiempo_experiencia' => ['required'],
                'detalle' => ['required'],
            ],
            [
                'estatus_laboral.required' => 'El campo Estatus Laboral es obligatorio',
                'disponibilidad.required' => 'El campo Disponibilidad es obligatorio',
                'rango_hora.required' => 'El campo Rango de Hora es obligatorio',
                'cantidad_hora.required' => 'El campo Cantidad de Horas es obligatorio',
                'tecnica.required' => 'El campo Técnica es obligatorio',
                'profesional.required' => 'El campo Profesional es obligatorio',
                'tiempo_experiencia.required' => 'El campo Tiempo de Experiencia es obligatorio',
                'detalle.required' => 'El campo Detalles de Profesión es obligatoria',
            ]);

            $record = new DatosLaboral();
            $record->personal_id = $id;
            $record->estatus_laboral = $request->estatus_laboral;
            $record->disponibilidad = $request->disponibilidad;
            $record->rango_hora = $request->rango_hora;
            $record->cantidad_hora = $request->cantidad_hora;
            $record->nombre_labor = $request->nombre_labor;
            $record->empresa = $request->empresa;
            $record->jefe_inmediato = $request->jefe_inmediato;
            $record->telefono = $request->telefono;
            $record->anos = $request->anos;
            $record->empresa_old = $request->empresa_old;
            $record->jefe_inmediato_old = $request->jefe_inmediato_old;
            $record->telefono_old = $request->telefono_old;
            $record->anos_old = $request->anos_old;
            $record->tecnica = $request->tecnica;
            $record->profesional = $request->profesional;
            $record->tiempo_experiencia = $request->tiempo_experiencia;
            $record->detalle = $request->detalle;
            $record->save();

            return redirect('personal/'.$id.'/actividades-laboral')->with('success', 'Registro de Experiencia Laboral Guardado Exitósamente');

        } else {
            return redirect('personal/'.$id.'/actividades-laboral')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $datolaboral_id)
    {
        $data = DatosLaboral::find($datolaboral_id);
        return view('estatus-laboral.edit', compact('id', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $datolaboral_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $residencia = DatosLaboral::where('personal_id', $id)->where('id', $datolaboral_id)->first();
            $residencia->estatus_laboral = $request->estatus_laboral;
            $residencia->disponibilidad = $request->disponibilidad;
            $residencia->rango_hora = $request->rango_hora;
            $residencia->cantidad_hora = $request->cantidad_hora;
            $residencia->nombre_labor = $request->nombre_labor;
            $residencia->empresa = $request->empresa;
            $residencia->jefe_inmediato = $request->jefe_inmediato;
            $residencia->telefono = $request->telefono;
            $residencia->anos = $request->anos;
            $residencia->empresa_old = $request->empresa_old;
            $residencia->jefe_inmediato_old = $request->jefe_inmediato_old;
            $residencia->telefono_old = $request->telefono_old;
            $residencia->anos_old = $request->anos_old;
            $residencia->tecnica = $request->tecnica;
            $residencia->profesional = $request->profesional;
            $residencia->tiempo_experiencia = $request->tiempo_experiencia;
            $residencia->detalle = $request->detalle;
            $residencia->save();

            return redirect('/personal/'.$id.'/actividades-laboral')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/actividades-laboral')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

}
