<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Personal;
use App\Models\Provincia;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', 'Empresa')->first();
        $provincias = Provincia::all();
        return view('empresacliente.create', compact('provincias', 'roles'));
    }

    public function store(Request $request)
    {

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
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'rol' => ['required'],
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
            'name.required' => 'El campo Usuario es obligatorio',
            'email.required' => 'El campo Correo es obligatorio',
            'password.required' => 'El campo Contraseña es obligatorio',
            'rol.required' => 'El campo Rol es obligatorio',
        ]);

        $urlLogo = null;
        if ($request->hasFile('logo')) {
            $uploadPath = public_path('/storage/LogosEmpresa/');
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = '/storage/LogosEmpresa/'.$fileName;
            $urlLogo = $url;
        }

        if($request->provincia == 'Seleccione'){
            $nameProvincia = null;
        }

        if($request->provincia != 'Seleccione'){
            $dato = Provincia::where('id', $request->provincia)->first();
            $nameProvincia = $dato->nombre;
        }
        $empresa = new User();
        $empresa->tipo = 'Empresa';
        $empresa->logo = $urlLogo;
        $empresa->empresa = $request->empresa;
        $empresa->actividad = $request->actividad;
        $empresa->telefono_empresa = $request->telefono_empresa;
        $empresa->correo_empresa = $request->correo_empresa;
        $empresa->representante = $request->representante;
        $empresa->telefono_representante = $request->telefono_representante;
        $empresa->correo_representante = $request->correo_representante;
        $empresa->provincia = $nameProvincia;
        $empresa->municipio = $request->municipio;
        $empresa->sector = $request->sector;
        $empresa->calle = $request->calle;
        $empresa->numero = $request->numero;
        $empresa->referencia = $request->referencia;
        $empresa->name = $request->name;
        $empresa->email = $request->email;
        $empresa->password = bcrypt($request->password);
        $empresa->save();

        $empresa->assignRole($request->rol);

        return redirect('empresas')->with('success', 'Registro Creado Correctamente!');
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

            $urlLogo = null;
            $registro = User::where('id', $id)->first();

            if ($request->hasFile('logo')) {
                $uploadPath = public_path('/storage/LogosEmpresa/');
                if (!file_exists($uploadPath)) {
                    mkdir(public_path('/storage/LogosEmpresa'), 0777);
                }
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = '/storage/LogosEmpresa/'.$fileName;
                $urlLogo = $url;
                $registro->logo = $urlLogo;
            }
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
