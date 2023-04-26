<?php

namespace App\Http\Controllers;

use App\Models\AlergiaMedicamentos;
use App\Models\Personal;
use Illuminate\Http\Request;

class AlergiaMedicamentosController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('alergias.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $medicamento = json_decode($request->Arraymedicamentos);

        $cant = count($medicamento);
        if ($cant != 0) {
            foreach ($medicamento as $key) {
                $dataM = new AlergiaMedicamentos();
                $dataM->personal_id = $id;
                $dataM->nombre = $key->medicamento;
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
    public function edit($id, $medicamento_id)
    {
        $data = AlergiaMedicamentos::find($medicamento_id);
        return view('alergias.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $medicamento_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $medicamento = AlergiaMedicamentos::where('personal_id', $id)->where('id', $medicamento_id)->first();
            $medicamento->nombre = $request->nombre;
            $medicamento->save();

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
    public function destroy($id, $medicamento_id)
    {
        $count = AlergiaMedicamentos::where('id', $medicamento_id)->count();
        if ($count>0) {
            $data = AlergiaMedicamentos::where('personal_id', $id)->where('id', $medicamento_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
