<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Personal;
use App\Models\Provincia;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::with('users')->where('name','Empresa')->get();
        return view('empresacliente.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = User::where('id', $id)->count();
        if ($count>0) {
            $data = User::where('id', $id)->first();
            return view('empresacliente.show', compact('data'));
        } else {
            return redirect('empresas')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = User::where('id', $id)->count();
        if ($count>0) {
            $provincias = Provincia::all();
            $data = User::where('id', $id)->first();
            return view('empresacliente.edit', compact('data', 'provincias'));
        } else {
            return redirect('empresas')->with('error', 'Problemas para Mostrar el Registro.');
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
        $count = User::where('id', $id)->count();
        if ($count>0) {
            $request->validate([
                'empresa' => ['required'],
                'actividad' => ['required'],
                'telefono_empresa' => ['required'],
                'correo_empresa' => ['required'],
                'representante' => ['required'],
                'telefono_representante' => ['required'],
                'correo_representante' => ['required'],
                'provincia' => ['required'],
                'municipio' => ['required'],
                'sector' => ['required'],
                'calle' => ['required'],
                'numero' => ['required'],
                'referencia' => ['required'],
            ],
            [
                'empresa.required' => 'El campo Nombre de Empresa es obligatorio',
                'actividad.required' => 'El campo Actividad es obligatorio',
                'telefono_empresa.required' => 'El campo Teléfono de Empresa es obligatorio',
                'correo_empresa.required' => 'El campo Correo Corporativo es obligatorio',
                'representante.required' => 'El campo Representante es obligatorio',
                'telefono_representante.required' => 'El campo Teléfono de Representante es obligatoria',
                'correo_representante.required' => 'El campo Correo de Representante es obligatoria',
                'provincia.required' => 'El campo Provincia es obligatorio',
                'municipio.required' => 'El campo Municipio es obligatorio',
                'sector.required' => 'El campo Sector es obligatorio',
                'calle.required' => 'El campo Calle es obligatorio',
                'numero.required' => 'El campo numero es obligatorio',
                'referencia.required' => 'El campo Referencia es obligatorio',
            ]);

            $registro = User::where('id', $id)->first();
            $registro->empresa = $request->empresa;
            $registro->actividad = $request->actividad;
            $registro->telefono_empresa = $request->telefono_empresa;
            $registro->correo_empresa = $request->correo_empresa;
            $registro->representante = $request->representante;
            $registro->telefono_representante = $request->telefono_representante;
            $registro->correo_representante = $request->correo_representante;
            if($request->provincia){
                $nameProvincia = Provincia::where('id', $request->provincia)->first();
                $registro->provincia = $nameProvincia->nombre;
            }
            $registro->municipio = $request->municipio;
            $registro->sector = $request->sector;
            $registro->calle = $request->calle;
            $registro->numero = $request->numero;
            $registro->referencia = $request->referencia;
            $registro->save();

            return redirect('empresas')->with('success', 'Se ha Actualizado con éxito');
        } else {
            return redirect('empresas')->with('error', 'Problemas para Mostrar el Registro.');
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
        $count = User::where('id', $id)->count();
        if ($count>0) {
            $empresa = Personal::where('user_id', $id)->count();

            if ($empresa>0) {
                return redirect('empresas')->with('error', 'No se puede eliminar el registro, hay datos dependientes al registro.');
            }
            $data = User::where('id', $id)->delete();
            return redirect('empresas')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('empresas')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }


}
