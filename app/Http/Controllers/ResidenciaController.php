<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Provincia;
use App\Models\Residencia;
use Illuminate\Http\Request;

class ResidenciaController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $residencia_id)
    {
        $data = Residencia::find($residencia_id);
        $provincias = Provincia::all();
        $personal = Personal::find($id);
        return view('residencia.edit', compact('id', 'data', 'provincias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $residencia_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $residencia = Residencia::where('personal_id', $id)->where('id', $residencia_id)->first();
            if($request->provincia){
                $nameProvincia = Provincia::where('id', $request->provincia)->first();
            $residencia->provincia = $nameProvincia->nombre;
            }
            $residencia->municipio = $request->municipio;
            $residencia->distrito_municipal = $request->distrito_municipal;
            $residencia->seccion = $request->seccion;
            $residencia->barrio = $request->barrio;
            $residencia->tipo_residencia = $request->tipo_residencia;
            $residencia->calle = $request->calle;
            $residencia->numero = $request->numero;
            $residencia->coordenada = $request->coordenada;
            $residencia->referencia_llegada = $request->referencia_llegada;
            $residencia->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }


}
