<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Phd;
use Illuminate\Http\Request;

class PhdController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('phds.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $phd = json_decode($request->Arrayphd);

        $cant = count($phd);
        if ($cant != 0) {
            foreach ($phd as $key) {
                $dataM = new Phd();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de PHD Guardado Exitósamente');
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
    public function edit($id, $phd_id)
    {
        $data = Phd::find($phd_id);
        return view('phds.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $phd_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $phd = Phd::where('personal_id', $id)->where('id', $phd_id)->first();
            $phd->personal_id = $id;
            $phd->institucion = $request->institucion;
            $phd->titulo = $request->titulo;
            $phd->ano = $request->ano;
            $phd->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de PHD Actualizado Exitósamente');

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
    public function destroy($id, $phd_id)
    {
        $count = Phd::where('id', $phd_id)->count();
        if ($count>0) {
            $data = Phd::where('personal_id', $id)->where('id', $phd_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro de PHD Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
