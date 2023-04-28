<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\ReferenciasPersonalesFamiliares;
use Illuminate\Http\Request;

class ReferenciasPersonalesFamiliaresController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('referencias.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $referencia = json_decode($request->ArrayReferencia);

        $cant = count($referencia);
        if ($cant != 0) {
            foreach ($referencia as $key) {
                $dataM = new ReferenciasPersonalesFamiliares();
                $dataM->personal_id = $id;
                $dataM->nombre = $key->nombre;
                $dataM->cedula = $key->cedula;
                $dataM->lugar_nacimiento = $key->lugar;
                $dataM->telefono = $key->telefono;
                $dataM->vinculo = $key->vinculo;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Guardado Exitosamente');
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
    public function edit($referencia_id, $id)
    {
        $data = ReferenciasPersonalesFamiliares::find($referencia_id);
        return view('referencias.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $referencia_id)
    {

        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $dataM = ReferenciasPersonalesFamiliares::where('personal_id', $id)->where('id', $referencia_id)->first();
            $dataM->nombre = $request->nombre;
            $dataM->cedula = $request->cedula;
            $dataM->lugar_nacimiento = $request->lugar_nacimiento;
            $dataM->telefono = $request->telefono;
            $dataM->vinculo = $request->vinculo;
            $dataM->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de Actualizado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'No hay datos que guardar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $referencia_id)
    {
        $count = ReferenciasPersonalesFamiliares::where('id', $referencia_id)->count();
        if ($count>0) {
            $data = ReferenciasPersonalesFamiliares::where('personal_id', $id)->where('id', $referencia_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
