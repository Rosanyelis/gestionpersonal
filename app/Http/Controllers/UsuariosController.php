<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('roles')->where('name', '!=', 'Desarrollador')->get();
        return view('usuarios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Desarrollador')->get();
        $provincias = Provincia::all();
        return view('usuarios.create', compact('roles', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipo == 'Empleado') {
            $request->validate([
                'cedula' => ['required', 'min:10'],
                'nombre' => ['required'],
                'apellido' => ['required'],
                'telefono' => ['required'],
                'flota' => ['required'],
                'cargo' => ['required'],
                'correo_personal' => ['required'],
            ],
            [
                'cedula.required' => 'El campo Cédula es obligatorio',
                'cedula.min' => 'La Cédula debe tener mínimo 10 números',
                'nombre.required' => 'El campo Nombre es obligatorio',
                'apellido.required' => 'El campo Apellido es obligatorio',
                'telefono.required' => 'El campo Teléfono es obligatorio',
                'flota.required' => 'El campo Flota es obligatoria',
                'cargo.required' => 'El campo Cargo es obligatoria',
                'correo_personal.required' => 'El campo Correo Personal es obligatorio',
            ]);
        }
        if ($request->tipo == 'Empresa') {
            $request->validate([
                'logo' => ['required'],
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
                'logo.required' => 'El campo Logo de Empresa es obligatorio',
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
        }
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', Password::min(8) // Debe tener por lo menos 8 caracteres
            ->mixedCase() // Debe tener mayúsculas + minúsculas
            ->letters() // Debe incluir letras
            ->numbers() // Debe incluir números
            ->symbols()], // Debe incluir símbolos],
            'rol' => ['required'],
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'email.required' => 'El campo Correo es obligatorio',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.max' => 'El campo Contraseña debe contener máximo 8 carácteres',
            'rol.required' => 'El campo Rol es obligatorio',
        ]);
        if($request->provincia == 'Seleccione'){
            $nameProvincia = null;
        }

        if($request->provincia != 'Seleccione'){
            $dato = Provincia::where('id', $request->provincia)->first();
            $nameProvincia = $dato->nombre;
        }
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'flota' => $request->flota,
            'cargo' => $request->cargo,
            'correo_personal' => $request->correo_personal,
            'empresa' => $request->empresa,
            'logo' => $urlLogo,
            'actividad' => $request->actividad,
            'telefono_empresa' => $request->telefono_empresa,
            'correo_empresa' => $request->correo_empresa,
            'representante' => $request->representante,
            'telefono_representante' => $request->telefono_representante,
            'correo_representante' => $request->correo_representante,
            'provincia' => $nameProvincia,
            'municipio' => $request->municipio,
            'sector' => $request->sector,
            'calle' => $request->calle,
            'numero' => $request->numero,
            'referencia' => $request->referencia,
        ]);

        $user->assignRole($request->rol);

        return redirect('configuraciones/usuarios')->with('success', 'Se ha Registrado con éxito');
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
            $data = User::with('roles')->where('id', $id)->first();
            return view('usuarios.show', compact('data'));
        } else {
            return redirect('configuraciones/usuarios')->with('error', 'Problemas para Mostrar el Registro.');
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
            $roles = Role::where('name', '!=', 'Desarrollador')->get();
            $data = User::with('roles')->where('id', $id)->first();
            $provincias = Provincia::all();
            return view('usuarios.edit', compact('data', 'roles', 'provincias'));
        } else {
            return redirect('configuraciones/usuarios')->with('error', 'Problemas para Mostrar el Registro.');
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
            if($request->password == null){
                $request->validate([
                    'name' => ['required'],
                    'email' => ['required'],
                    'rol' => ['required'],
                ],
                [
                    'name.required' => 'El campo Nombre es obligatorio',
                    'email.required' => 'El campo Correo es obligatorio',
                    'rol.required' => 'El campo Rol es obligatorio',
                ]);
            } else {
                $request->validate([
                    'name' => ['required'],
                    'email' => ['required'],
                    'rol' => ['required'],
                    'password' => [Password::min(8) // Debe tener por lo menos 12 caracteres
                    ->mixedCase() // Debe tener mayúsculas + minúsculas
                    ->letters() // Debe incluir letras
                    ->numbers() // Debe incluir números
                    ->symbols() // Debe tener por lo menos 8 caracteres
                    ]
                ],
                [
                    'name.required' => 'El campo Nombre es obligatorio',
                    'email.required' => 'El campo Correo es obligatorio',
                    'rol.required' => 'El campo Rol es obligatorio',
                ]);
            }

            $dato = User::where('id', $id)->first();

            if($request->provincia == 'Seleccione'){
                $nameProvincia = null;
            }

            if($request->provincia != 'Seleccione'){
                $dato = Provincia::where('id', $request->provincia)->first();
                $nameProvincia = $dato->nombre;
            }

            $urlLogo = $dato->logo;

            $registro = User::where('id', $id)->first();
            $registro->name = $request->name;
            $registro->email = $request->email;
            if ($request->password != null) {
                $registro->password = Hash::make($request->password);
            }
            $registro->cedula = $request->cedula;
            $registro->nombre = $request->nombre;
            $registro->apellido = $request->apellido;
            $registro->telefono = $request->telefono;
            $registro->flota = $request->flota;
            $registro->cargo = $request->cargo;
            $registro->correo_personal = $request->correo_personal;
            $registro->empresa = $request->empresa;
            if ($request->hasFile('logo')) {
                $uploadPath = public_path('/storage/LogosEmpresa/');
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = '/storage/LogosEmpresa/'.$fileName;
                $urlLogo = $url;
                $registro->logo = $urlLogo;
            }
            $registro->actividad = $request->actividad;
            $registro->telefono_empresa = $request->telefono_empresa;
            $registro->correo_empresa = $request->correo_empresa;
            $registro->representante = $request->representante;
            $registro->telefono_representante = $request->telefono_representante;
            $registro->correo_representante = $request->correo_representante;
            $registro->provincia = $nameProvincia;
            $registro->municipio = $request->municipio;
            $registro->sector = $request->sector;
            $registro->calle = $request->calle;
            $registro->numero = $request->numero;
            $registro->referencia = $request->referencia;
            $registro->save();

            if ($registro->roles[0]->name != $request->rol){
                $registro->removeRole($dato->roles[0]->name);
                $registro->assignRole($request->rol);
            }



            return redirect('configuraciones/usuarios')->with('success', 'Se ha Actualizado con éxito');

        } else {
            return redirect('configuraciones/usuarios')->with('error', 'Problemas para Mostrar el Registro.');
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
            $user = User::where('id', $id)->first();

            if ($user->empresa_id != null) {
                return redirect('configuraciones/usuarios')->with('error', 'No se puede eliminar el registro, hay datos dependientes al usuario.');
            }
            $user->removeRole($user->roles[0]->name);
            $data = User::where('id', $id)->delete();
            return redirect('configuraciones/usuarios')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('configuraciones/usuarios')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
