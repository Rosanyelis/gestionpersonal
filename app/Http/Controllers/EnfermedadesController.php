<?php

namespace App\Http\Controllers;

use App\Models\Enfermedades;
use App\Models\Personal;
use Illuminate\Http\Request;

class EnfermedadesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('enfermedades.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $enfermedad = json_decode($request->Arrayenfermedades);

        $cant = count($enfermedad);
        if ($cant != 0) {
            foreach ($enfermedad as $key) {
                $dataM = new Enfermedades();
                $dataM->personal_id = $id;
                $dataM->nombre = $key->enfermedades;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Guardado Exitósamente');
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
    public function edit($id, $enfermedad_id)
    {
        $data = Enfermedades::find($enfermedad_id);
        return view('enfermedades.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $enfermedad_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $enfermedad = Enfermedades::where('personal_id', $id)->where('id', $enfermedad_id)->first();
            $enfermedad->nombre = $request->nombre;
            $enfermedad->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Actualizado Exitósamente');

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
    public function destroy($id, $enfermedad_id)
    {
        $count = Enfermedades::where('id', $enfermedad_id)->count();
        if ($count>0) {
            $data = Enfermedades::where('personal_id', $id)->where('id', $enfermedad_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

}
