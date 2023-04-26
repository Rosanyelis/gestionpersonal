<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::where('name', '!=', 'Desarrollador')->get();
        return view('roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles'],
        ],
        [
            'name.required' => 'El campo Rol es obligatorio',
            'name.unique' => 'El Rol ya existe',
        ]);

        $registro = new Role();
        $registro->name = $request->name;
        $registro->save();

        return redirect('configuraciones/roles')->with('success', 'Registro Guardado Exitósamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Role::where('id', $id)->count();
        if ($count>0) {
            $data = Role::where('id', $id)->first();
            return view('roles.edit', compact('data'));
        } else {
            return redirect('configuraciones/roles')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = Role::where('id', $id)->count();
        if ($count>0) {
            $request->validate([
                'nombre' => ['required'],
            ],
            [
                'nombre.required' => 'El campo Rol es obligatorio',
            ]);

            $registro = Role::where('id', $id)->first();
            $registro->name = $request->nombre;
            $registro->save();

            return redirect('configuraciones/roles')->with('success', 'Registro Actualizado Exitosamente');
        } else {
            return redirect('configuraciones/roles')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Role::where('id', $id)->count();
        if ($count>0) {
            $rol = Role::where('id', $id)->first();
            $user = User::role($rol->name)->count();
            if ($user>0) {
                return redirect('configuraciones/roles')->with('error', 'No se puede eliminar el registro, hay usuarios asignados al rol.');
            }
            $data = Role::where('id', $id)->delete();
            return redirect('configuraciones/roles')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('configuraciones/roles')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
