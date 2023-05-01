<?php

namespace App\Http\Controllers;

use App\Models\Maestria;
use App\Models\Personal;
use Illuminate\Http\Request;

class MaestriaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('maestrias.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $maestrias = json_decode($request->Arraymaestrias);

        $cant = count($maestrias);
        if ($cant != 0) {
            foreach ($maestrias as $key) {
                $dataM = new Maestria();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('success', 'Registro de Maestría Guardado Exitósamente');
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
    public function edit($id, $maestrias_id)
    {
        $data = Maestria::find($maestrias_id);
        return view('maestrias.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $maestrias_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $maestrias = Maestria::where('personal_id', $id)->where('id', $maestrias_id)->first();
            $maestrias->personal_id = $id;
            $maestrias->institucion = $request->institucion;
            $maestrias->titulo = $request->titulo;
            $maestrias->ano = $request->ano;
            $maestrias->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('success', 'Registro de Maestría Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $maestrias_id)
    {
        $count = Maestria::where('id', $maestrias_id)->count();
        if ($count>0) {
            $data = Maestria::where('personal_id', $id)->where('id', $maestrias_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')
                        ->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
