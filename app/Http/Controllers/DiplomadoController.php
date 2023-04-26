<?php

namespace App\Http\Controllers;

use App\Models\Diplomado;
use App\Models\Personal;
use Illuminate\Http\Request;

class DiplomadoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('diplomados.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $diplomados = json_decode($request->Arraydiplomados);

        $cant = count($diplomados);
        if ($cant != 0) {
            foreach ($diplomados as $key) {
                $dataM = new Diplomado();
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
    public function edit($id, $diplomado_id)
    {
        $data = Diplomado::find($diplomado_id);
        return view('diplomados.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $diplomado_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $diplomados = Diplomado::where('personal_id', $id)->where('id', $diplomado_id)->first();
            $diplomados->personal_id = $id;
            $diplomados->institucion = $request->institucion;
            $diplomados->titulo = $request->titulo;
            $diplomados->ano = $request->ano;
            $diplomados->save();

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
    public function destroy($id, $diplomado_id)
    {
        $count = Diplomado::where('id', $diplomado_id)->count();
        if ($count>0) {
            $data = Diplomado::where('personal_id', $id)->where('id', $diplomado_id)->delete();
            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/actividades-educativa')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
