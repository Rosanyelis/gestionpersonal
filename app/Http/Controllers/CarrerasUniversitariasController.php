<?php

namespace App\Http\Controllers;

use App\Models\CarrerasUniversitarias;
use App\Models\Personal;
use Illuminate\Http\Request;

class CarrerasUniversitariasController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('carreras.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $carreras = json_decode($request->Arraycarreras);

        $cant = count($carreras);
        if ($cant != 0) {
            foreach ($carreras as $key) {
                $dataM = new CarrerasUniversitarias();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                    ->with('success', 'Registro de Carrera Guardado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                    ->with('error', 'No hay datos que guardar.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $carrera_id)
    {
        $data = CarrerasUniversitarias::find($carrera_id);
        return view('carreras.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $carrera_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $carrera = CarrerasUniversitarias::where('personal_id', $id)->where('id', $carrera_id)->first();
            $carrera->personal_id = $id;
            $carrera->institucion = $request->institucion;
            $carrera->titulo = $request->titulo;
            $carrera->ano = $request->ano;
            $carrera->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('success', 'Registro de Carrera Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $carrera_id)
    {
        $count = CarrerasUniversitarias::where('id', $carrera_id)->count();
        if ($count>0) {
            $data = CarrerasUniversitarias::where('personal_id', $id)->where('id', $carrera_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('success', 'Registro de Carrera Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                    ->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
