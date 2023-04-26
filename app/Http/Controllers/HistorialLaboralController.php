<?php

namespace App\Http\Controllers;

use App\Models\DatosLaboral;
use App\Models\HistorialLaboral;
use App\Models\Personal;
use Illuminate\Http\Request;

class HistorialLaboralController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('historialLaboral.create', compact('id'));
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

            $historial = json_decode($request->historialLaboral);
            if ($historial) {
                foreach ($historial as $key) {
                    $dataE = new HistorialLaboral();
                    $dataE->personal_id = $id;
                    $dataE->empresa =  $key->empresa;
                    $dataE->labor =  $key->labor;
                    $dataE->ano_entrada = $key->anos_entrada;
                    $dataE->ano_salida = $key->anos_salida;
                    $dataE->cantidad_ano = $key->cantidad_anos;
                    $dataE->cantidad_meses = $key->cantidad_meses;
                    $dataE->save();
                }
            }

            return redirect('/personal/'.$id.'/actividades-laboral')->with('success', 'Registro de Experiencia Laboral Guardado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/actividades-laboral')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $experiencia_id)
    {
        $data = HistorialLaboral::find($experiencia_id);
        return view('historialLaboral.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $experiencia_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $historial = HistorialLaboral::where('personal_id', $id)->where('id', $experiencia_id)->first();
            $historial->personal_id = $id;
            $historial->empresa =  $request->empresa;
            $historial->labor =  $request->labor;
            $historial->ano_entrada = $request->ano_entrada;
            $historial->ano_salida = $request->ano_salida;
            $historial->cantidad_ano = $request->cantidad_anos;
            $historial->cantidad_meses = $request->cantidad_meses;
            $historial->save();

            return redirect('/personal/'.$id.'/actividades-laboral')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/actividades-laboral')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $experiencia_id)
    {
        $count = HistorialLaboral::where('id', $experiencia_id)->count();
        if ($count>0) {
            $data = HistorialLaboral::where('personal_id', $id)->where('id', $experiencia_id)->delete();
            return redirect('/personal/'.$id.'/actividades-laboral')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/actividades-laboral')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
