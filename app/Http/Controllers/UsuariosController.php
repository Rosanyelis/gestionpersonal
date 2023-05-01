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
        $roles = Role::where('name', '!=', 'Desarrollador')->where('name', '!=', 'Empresa')->get();
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
        $request->validate([
            'cedula' => ['required', 'min:10', 'unique:users'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'telefono' => ['required'],
            'flota' => ['required'],
            'cargo' => ['required'],
            'correo_personal' => ['required'],
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
            'cedula.required' => 'El campo Cédula es obligatorio',
            'cedula.min' => 'La Cédula debe tener mínimo 10 números',
            'cedula.unique' => 'La Cédula ya se encuentra registrada',
            'nombre.required' => 'El campo Nombre es obligatorio',
            'apellido.required' => 'El campo Apellido es obligatorio',
            'telefono.required' => 'El campo Teléfono es obligatorio',
            'flota.required' => 'El campo Flota es obligatoria',
            'cargo.required' => 'El campo Cargo es obligatoria',
            'correo_personal.required' => 'El campo Correo Personal es obligatorio',
            'name.required' => 'El campo Nombre es obligatorio',
            'email.required' => 'El campo Correo es obligatorio',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.max' => 'El campo Contraseña debe contener máximo 8 carácteres',
            'rol.required' => 'El campo Rol es obligatorio',
        ]);

        $user = User::create([
            'tipo' => 'Empleado',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'flota' => $request->flota,
            'cargo' => $request->cargo,
            'correo_personal' => $request->correo_personal,
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
            $roles = Role::where('name', '!=', 'Desarrollador')->where('name', '!=', 'Empresa')->get();
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
