<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Talleres;
use Illuminate\Http\Request;

class TalleresController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('talleres.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $taller = json_decode($request->Arraytaller);

        $cant = count($taller);
        if ($cant != 0) {
            foreach ($taller as $key) {
                $dataM = new Talleres();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Talleres Guardado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'No hay datos que guardar.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $taller_id)
    {
        $data = Talleres::find($taller_id);
        return view('talleres.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $taller_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $taller = Talleres::where('personal_id', $id)->where('id', $taller_id)->first();
            $taller->personal_id = $id;
            $taller->institucion = $request->institucion;
            $taller->titulo = $request->titulo;
            $taller->ano = $request->ano;
            $taller->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Talleres Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $taller_id)
    {
        $count = Talleres::where('id', $taller_id)->count();
        if ($count>0) {
            $data = Talleres::where('personal_id', $id)->where('id', $taller_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Talleres Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
