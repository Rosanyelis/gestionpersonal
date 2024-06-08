<?php

namespace App\Http\Controllers;

use App\Models\TipoAlerta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CandidatoExterno;
use App\Models\IntegridadLaboral;
use App\Models\LevantamientoCampo;
use App\Models\AnaliticaPsicometria;
use App\Models\CertificadoIntegridadLaboral;
use App\Models\InvestigacionDepuracionLeyes;
use App\Http\Requests\StoreIntegridadLaboral;

class CandidatoExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CandidatoExterno::all();
        return view('candidatoExterno.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatoExterno.create');
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
            'cedula' => ['required', 'min:10'],
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'fecha_nacimiento' => ['required'],
        ],
        [
            'cedula.required' => 'El campo Cédula es obligatorio',
            'cedula.min' => 'La Cédula debe tener mínimo 10 números',
            'nombres.required' => 'El campo Nombres es obligatorio',
            'apellidos.required' => 'El campo Apellidos es obligatorio',
            'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',
            'lugar_nacimiento.required' => 'El campo Lugar de Nacimiento es obligatorio',

        ]);

        $count = CandidatoExterno::where('cedula', $request->cedula)
                                    ->count();
        if($count > 0){
            return redirect('candidatos-externos')->with('error', 'Ya existe un registro con la misma Cédula y Empresa');
        }
        $foto = null;
        if ($request->hasFile('foto')) {
            $uploadPath = public_path('/storage/CandidatosExternos/');
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = '/storage/CandidatosExternos/'.$fileName;
            $foto = $url;
        }

        $candidatoExterno = new CandidatoExterno();
        $candidatoExterno->cedula = $request->cedula;
        $candidatoExterno->nombres = $request->nombres;
        $candidatoExterno->apellidos = $request->apellidos;
        $candidatoExterno->fecha_nacimiento = $request->fecha_nacimiento;
        $candidatoExterno->lugar_nacimiento = $request->lugar_nacimiento;
        $candidatoExterno->cedula_anterior = $request->cedula_anterior;
        $candidatoExterno->pasaporte = $request->pasaporte;
        $candidatoExterno->telefono = $request->telefono;
        $candidatoExterno->foto = $foto;
        $candidatoExterno->save();

        return redirect('candidatos-externos')->with('success', 'Registro Guardado Exitósamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CandidatoExterno::where('id', $id)->first();
        return view('candidatoExterno.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CandidatoExterno::where('id', $id)->first();
        return view('candidatoExterno.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CandidatoExterno  $candidatoExterno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = CandidatoExterno::where('id', $id)->count();
        if ($count>0) {
            $request->validate([
                'cedula' => ['required', 'min:10'],
                'nombres' => ['required'],
                'apellidos' => ['required'],
                'fecha_nacimiento' => ['required'],
            ],
            [
                'cedula.required' => 'El campo Cédula es obligatorio',
                'cedula.min' => 'La Cédula debe tener mínimo 10 números',
                'nombres.required' => 'El campo Nombres es obligatorio',
                'apellidos.required' => 'El campo Apellidos es obligatorio',
                'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',

            ]);

            $foto = null;
            if ($request->hasFile('foto')) {
                $uploadPath = public_path('/storage/CandidatosExternos/');
                $file = $request->file('foto');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = '/storage/CandidatosExternos/'.$fileName;
                $foto = $url;
            }

            $candidatoExterno = CandidatoExterno::find($id);
            $candidatoExterno->cedula = $request->cedula;
            $candidatoExterno->nombres = $request->nombres;
            $candidatoExterno->apellidos = $request->apellidos;
            $candidatoExterno->fecha_nacimiento = $request->fecha_nacimiento;
            $candidatoExterno->lugar_nacimiento = $request->lugar_nacimiento;
            $candidatoExterno->cedula_anterior = $request->cedula_anterior;
            $candidatoExterno->pasaporte = $request->pasaporte;
            $candidatoExterno->telefono = $request->telefono;
            $candidatoExterno->foto = $foto;
            $candidatoExterno->save();

            return redirect('candidatos-externos')->with('success', 'Registro Actualizado Exitósamente');
        } else {
            return redirect('candidatos-externos')->with('error', 'No se encontró el registro');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function investigacionlaboral($id)
    {
        return view('candidatoExterno.certificaciones', compact('id'));
    }

    public function alertasAjax()
    {
        $data = TipoAlerta::all();
        return response()->json($data);
    }

    public function alertasAjaxCode(Request $request)
    {
        $data = TipoAlerta::where('codigo', $request->code)->first();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecertificaciones(StoreIntegridadLaboral $request, $id)
    {
        $data = $request->all();
        $data['candidato_id'] = $id;
        IntegridadLaboral::create($data);

        return redirect('/candidatos-externos')->with('success', 'Registro de Información Confidencial Guardado Exitósamente');

    }
}
