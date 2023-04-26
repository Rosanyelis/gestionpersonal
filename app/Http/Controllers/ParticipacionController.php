<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use App\Models\Personal;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('participacion.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $participacion = json_decode($request->Arrayparticipacion);

        $cant = count($participacion);
        if ($cant != 0) {
            foreach ($participacion as $key) {
                $dataM = new Participacion();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro de Guardado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/actividades-educativa')->with('error', 'No hay datos que guardar.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $participacion_id)
    {
        $data = Participacion::find($participacion_id);
        return view('participacion.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $participacion_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $participacion = Participacion::where('personal_id', $id)->where('id', $participacion_id)->first();
            $participacion->personal_id = $id;
            $participacion->institucion = $request->institucion;
            $participacion->titulo = $request->titulo;
            $participacion->ano = $request->ano;
            $participacion->save();

            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/actividades-educativa')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $participacion_id)
    {
        $count = Participacion::where('id', $participacion_id)->count();
        if ($count>0) {
            $data = Participacion::where('personal_id', $id)->where('id', $participacion_id)->delete();
            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/actividades-educativa')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
