<?php

namespace App\Http\Controllers;

use App\Models\ContactosEmergencia;
use App\Models\Personal;
use Illuminate\Http\Request;

class ContactosEmergenciaController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('contactosEmergencia.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $contactos = json_decode($request->ArrayContacto);

        $cant = count($contactos);
        if ($cant != 0) {
            foreach ($contactos as $key) {
                $dataM = new ContactosEmergencia();
                $dataM->personal_id = $id;
                $dataM->nombre = $key->nombre;
                $dataM->telefono = $key->telefono;
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
    public function edit($id, $contacto_id)
    {
        $data = ContactosEmergencia::find($contacto_id);
        return view('contactosEmergencia.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $contacto_id)
    {

        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $dataM = ContactosEmergencia::where('personal_id', $id)->where('id', $contacto_id)->first();
            $dataM->nombre = $request->nombre;
            $dataM->telefono = $request->telefono;
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
    public function destroy($id, $contacto_id)
    {
        $count = ContactosEmergencia::where('id', $contacto_id)->count();
        if ($count>0) {
            $data = ContactosEmergencia::where('personal_id', $id)->where('id', $contacto_id)->delete();
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
