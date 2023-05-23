<?php

namespace App\Http\Controllers;

use App\Models\AlergiaMedicamentos;
use App\Models\AnaliticaPsicometria;
use App\Models\CarrerasUniversitarias;
use App\Models\CertificadoIntegridadLaboral;
use App\Models\ContactosEmergencia;
use App\Models\CursosTecnicos;
use App\Models\DatosLaboral;
use App\Models\Diplomado;
use App\Models\Enfermedades;
use App\Models\HistorialLaboral;
use App\Models\IntegridadLaboral;
use App\Models\InvestigacionDepuracionLeyes;
use App\Models\LevantamientoCampo;
use App\Models\Maestria;
use App\Models\Municipio;
use App\Models\Participacion;
use App\Models\Personal;
use App\Models\Phd;
use App\Models\Provincia;
use App\Models\ReferenciasPersonalesFamiliares;
use App\Models\Residencia;
use App\Models\Talleres;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();

        if($role == 'Empresa'){
            $data = Personal::where('user_id', Auth::user()->id)->get();
            return view('personal.index', compact('data'));
        }
        if($role == 'Administrador' OR $role == 'Desarrollador'){
            $data = Personal::all();
            return view('personal.index', compact('data'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();
        return view('personal.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Auth::user()->getRoleNames()->first();
        $request->validate([
            'cedula' => ['required', 'min:10'],
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'fecha_nacimiento' => ['required'],
            'lugar_nacimiento' => ['required'],
            'enfermedad' => ['required'],
            'medicamento' => ['required'],
            'contacto' => ['required'],
            'provincia' => ['required'],
            'municipio' => ['required'],
            'distrito_municipal' => ['required'],
            'sector' => ['required'],
            'seccion' => ['required'],
            'barrio' => ['required'],
        ],
        [
            'cedula.required' => 'El campo Cédula es obligatorio',
            'cedula.min' => 'La Cédula debe tener mínimo 10 números',
            'nombres.required' => 'El campo Nombres es obligatorio',
            'apellidos.required' => 'El campo Apellidos es obligatorio',
            'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',
            'lugar_nacimiento.required' => 'El campo Lugar de Nacimiento es obligatorio',

            'enfermedad.required' => 'La respuesta de Padecer alguna enfermedad es obligatoria',
            'medicamento.required' => 'La respuesta Si es Alérgico a algún medicamento es obligatoria',
            'contacto.required' => 'La respuesta de Poseer algún contacto de emergencia es obligatoria',

            'provincia.required' => 'El campo Provincia es obligatorio',
            'municipio.required' => 'El campo Municipio es obligatorio',
            'distrito_municipal.required' => 'El campo Distrito Municipal es obligatorio',
            'seccion.required' => 'El campo Sección es obligatorio',
            'sector.required' => 'El campo Sector es obligatorio',
            'barrio.required' => 'El campo Barrio es obligatorio',

        ]);

        $fotoFrontal = null;
        $fotoLateral = null;
        if ($request->hasFile('foto_frontal')) {
            $uploadPath = public_path('/storage/FotosCandidatos/');
            $file = $request->file('foto_frontal');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = '/storage/FotosCandidatos/'.$fileName;
            $fotoFrontal = $url;
        }
        if ($request->hasFile('foto_lateral')) {
            $uploadPath = public_path('/storage/FotosCandidatos/');
            $file = $request->file('foto_lateral');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = '/storage/FotosCandidatos/'.$fileName;
            $fotoLateral = $url;
        }

        if($role == 'Empresa'){
            $idEmpresa = Auth::user()->id;
            $codigo = 'REF-'.rand(1,10000);
        }
        if($role == 'Administrador' OR $role == 'Desarrollador'){
            $codigo = 'PROP-'.rand(1,10000);
            $idEmpresa = null;
        }
        $registro = new Personal();
        if($idEmpresa){
            $registro->user_id = $idEmpresa;
        }
        $registro->codigo = $codigo;
        $registro->cedula = $request->cedula;
        $registro->nombres = $request->nombres;
        $registro->apellidos = $request->apellidos;
        $registro->apodo = $request->apodo;
        $registro->fecha_nacimiento = $request->fecha_nacimiento;
        $registro->lugar_nacimiento = $request->lugar_nacimiento;
        $registro->estado_civil = $request->estado_civil;
        $registro->nacionalidad = $request->nacionalidad;
        $registro->tipo_sangre = $request->tipo_sangre;
        $registro->foto_frontal = $fotoFrontal;
        $registro->foto_lateral = $fotoLateral;
        $registro->save();

        $personalId = $registro->id;

        $residencia = new Residencia();
        $residencia->personal_id = $personalId;
        if($request->provincia){
            $nameProvincia = Provincia::where('id', $request->provincia)->first();
            $residencia->provincia = $nameProvincia->nombre;
        }
        $residencia->municipio = $request->municipio;
        $residencia->distrito_municipal = $request->distrito_municipal;
        $residencia->sector = $request->sector;
        $residencia->seccion = $request->seccion;
        $residencia->barrio = $request->barrio;
        $residencia->tipo_residencia = $request->tipo_residencia;
        $residencia->calle = $request->calle;
        $residencia->numero = $request->numero;
        $residencia->coordenada = $request->coordenada;
        $residencia->referencia_llegada = $request->referencia_llegada;
        $residencia->save();

        if ($request->enfermedad == 'Si') {
            foreach ($request->enfermedades as $key => $value) {
                $dataE = new Enfermedades();
                $dataE->personal_id = $personalId;
                $dataE->nombre = $value;
                $dataE->save();
            }
        }

        if ($request->medicamento == 'Si') {
            foreach ($request->alergias as $key => $value) {
                $dataM = new AlergiaMedicamentos();
                $dataM->personal_id = $personalId;
                $dataM->nombre = $value;
                $dataM->save();
            }
        }

        if ($request->contacto == 'Si') {
            $dataContacto = array_combine($request->contactos, $request->telefonos);
            foreach ($dataContacto as $key => $value) {
                $dataC = new ContactosEmergencia();
                $dataC->personal_id = $personalId;
                $dataC->nombre = $key;
                $dataC->telefono = $value;
                $dataC->save();
            }
        }

        $referencia = json_decode($request->ArrayReferencia);

        $cant = count($referencia);
        if ($cant != 0) {
            foreach ($referencia as $key) {
                $dataM = new ReferenciasPersonalesFamiliares();
                $dataM->personal_id = $personalId;
                $dataM->nombre = $key->nombre;
                $dataM->cedula = $key->cedula;
                $dataM->lugar_nacimiento = $key->lugar;
                $dataM->telefono = $key->telefono;
                $dataM->vinculo = $key->vinculo;
                $dataM->save();
            }
        }

        return redirect('personal')->with('success', 'Registro Guardado Exitósamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actividadeducativa($id)
    {
        $data = Personal::where('id', $id)->first();
        return view('personal.capacidadeducativa', compact('data', 'id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecapacidadeducativa(Request $request, $id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            // dd($request);
            $carreras = json_decode($request->carreras);
            if ($carreras) {
                foreach ($carreras as $key) {
                    $dataE = new CarrerasUniversitarias();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $maestrias = json_decode($request->maestrias);
            if ($maestrias) {
                foreach ($maestrias as $key) {
                    $dataE = new Maestria();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $phd = json_decode($request->phd);
            if ($phd) {
                foreach ($phd as $key) {
                    $dataE = new Phd();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $diplomado = json_decode($request->diplomado);
            if ($diplomado) {
                foreach ($diplomado as $key) {
                    $dataE = new Diplomado();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $cursos = json_decode($request->cursos);
            if ($cursos) {
                foreach ($cursos as $key) {
                    $dataE = new CursosTecnicos();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $talleres = json_decode($request->talleres);
            if ($talleres) {
                foreach ($talleres as $key) {
                    $dataE = new Talleres();
                    $dataE->personal_id = $id;
                    $dataE->institucion = $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }
            $participacion = json_decode($request->participacion);
            if ($participacion) {
                foreach ($participacion as $key) {
                    $dataE = new Participacion();
                    $dataE->personal_id = $id;
                    $dataE->institucion =  $key->institucion;
                    $dataE->titulo = $key->titulo;
                    $dataE->ano = $key->ano;
                    $dataE->save();
                }
            }

            return redirect('personal')->with('success', 'Registro de Capacidades Educativas Guardado Exitósamente');

        } else {
            return redirect('personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actividadlaboral($id)
    {
        $data = Personal::where('id', $id)->first();
        return view('personal.experiencialaboral', compact('id', 'data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function investigacionlaboral($id)
    {
        return view('personal.certificaciones', compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecertificaciones(Request $request, $id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {

            $request->validate([
                'fecha' => ['required'],
                'certificado_procuraduria' => ['required'],
                'certificado_institucion' => ['required'],
                'actividad_antisocial' => ['required'],
                'reporte_actividad_noprocesada' => ['required'],
                'prueba_poligrafica' => ['required'],
                'prueba_psicometrica' => ['required'],
                'enfermedades_contagiosas' => ['required'],
                'consumo_alcohol' => ['required'],
                'sustancia_prohibida' => ['required'],
                'visita_domiciliaria' => ['required'],
                'levantamiento_coordinado' => ['required'],
                'investigacion_entorno' => ['required'],
                'levantamiento_dactilar' => ['required'],
                'levantamiento_fotografia' => ['required'],
                'integridad_familiar' => ['required'],
                'resultado' => ['required'],
            ],
            [
                'fecha.required' => 'La fecha es obligatoria',
                'certificado_procuraduria.required' => 'La respuesta de Certificado de Procuraduría es obligatoria',
                'certificado_institucion.required' => 'La respuesta de Certificado de Institución es obligatoria',
                'actividad_antisocial.required' => 'La respuesta de Actividad Antisocial es obligatoria',
                'reporte_actividad_noprocesada.required' => 'La respuesta de Reporte de Actividad No Procesada es obligatoria',
                'prueba_poligrafica.required' => 'La respuesta de Prueba Poligráfica es obligatoria',
                'prueba_psicometrica.required' => 'La respuesta de Prueba Psicométrica es obligatoria',
                'enfermedades_contagiosas.required' => 'La respuesta de Enfermedades Contagiosas es obligatoria',
                'consumo_alcohol.required' => 'La respuesta de Consumo de Alcohol es obligatoria',
                'sustancia_prohibida.required' => 'La respuesta de Sustancia Prohibida es obligatoria',
                'visita_domiciliaria.required' => 'La respuesta de Visita Domiciliaria es obligatoria',
                'levantamiento_coordinado.required' => 'La respuesta de Levantamiento Coordinado es obligatoria',
                'investigacion_entorno.required' => 'La respuesta de Investigación de Entorno es obligatoria',
                'levantamiento_dactilar.required' => 'La respuesta de Levantamiento Dactilar es obligatoria',
                'levantamiento_fotografia.required' => 'La respuesta de Levantamiento Fotográfico es obligatoria',
                'integridad_familiar.required' => 'La respuesta de Integridad Familiar es obligatoria',
                'resultado.required' => 'La respuesta de Resultado es obligatoria',
            ]);

            $reg = new IntegridadLaboral();
            $reg->personal_id = $id;
            $reg->fecha = $request->fecha;
            $reg->certificado_procuraduria = $request->certificado_procuraduria;
            $reg->certificado_institucion = $request->certificado_institucion;
            $reg->actividad_antisocial = $request->actividad_antisocial;
            $reg->reporte_actividad_noprocesada = $request->reporte_actividad_noprocesada;
            $reg->prueba_poligrafica = $request->prueba_poligrafica;
            $reg->prueba_psicometrica = $request->prueba_psicometrica;
            $reg->enfermedades_contagiosas = $request->enfermedades_contagiosas;
            $reg->consumo_alcohol = $request->consumo_alcohol;
            $reg->sustancia_prohibida = $request->sustancia_prohibida;
            $reg->visita_domiciliaria = $request->visita_domiciliaria;
            $reg->levantamiento_coordinado = $request->levantamiento_coordinado;
            $reg->investigacion_entorno = $request->investigacion_entorno;
            $reg->levantamiento_dactilar = $request->levantamiento_dactilar;
            $reg->levantamiento_fotografia = $request->levantamiento_fotografia;
            $reg->integridad_familiar = $request->integridad_familiar;
            $reg->resultado = $request->resultado;
            $reg->detalle = $request->detalle;
            $reg->save();


            return redirect('/personal')->with('success', 'Registro de Información Confidencial Guardado Exitósamente');

        } else {
            return redirect('/personal')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Personal::where('id', $id)->first();
        return view('personal.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Personal::where('id', $id)->first();
        return view('personal.edit', compact('data'));
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
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $request->validate([
                'cedula' => ['required', 'min:10'],
                'nombres' => ['required'],
                'apellidos' => ['required'],
                'fecha_nacimiento' => ['required'],
                'lugar_nacimiento' => ['required'],
            ],
            [
                'cedula.required' => 'El campo Cédula es obligatorio',
                'cedula.min' => 'La Cédula debe tener mínimo 10 números',
                'nombres.required' => 'El campo Nombres es obligatorio',
                'apellidos.required' => 'El campo Apellidos es obligatorio',
                'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio',
                'lugar_nacimiento.required' => 'El campo Lugar de Nacimiento es obligatorio',
            ]);

            $fotoFrontal = null;
            $fotoLateral = null;


            $registro = Personal::where('id', $id)->first();
            if ($request->hasFile('foto_frontal')) {
                $uploadPath = public_path('/storage/FotosCandidatos/');
                if (!file_exists($uploadPath)) {
                    mkdir(public_path('/storage/FotosCandidatos'), 0777);
                }
                $file = $request->file('foto_frontal');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = '/storage/FotosCandidatos/'.$fileName;
                $registro->foto_frontal = $url;
            }
            if ($request->hasFile('foto_lateral')) {
                $uploadPath = public_path('/storage/FotosCandidatos/');
                if (!file_exists($uploadPath)) {
                    mkdir(public_path('/storage/FotosCandidatos'), 0777);
                }
                $file = $request->file('foto_lateral');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = '/storage/FotosCandidatos/'.$fileName;
                $registro->foto_lateral = $url;
            }
            $registro->cedula = $request->cedula;
            $registro->nombres = $request->nombres;
            $registro->apellidos = $request->apellidos;
            $registro->apodo = $request->apodo;
            $registro->fecha_nacimiento = $request->fecha_nacimiento;
            $registro->lugar_nacimiento = $request->lugar_nacimiento;
            $registro->estado_civil = $request->estado_civil;
            $registro->nacionalidad = $request->nacionalidad;
            $registro->tipo_sangre = $request->tipo_sangre;
            $registro->save();

            return redirect('/personal/'.$id.'/ver-perfil-de-personal')->with('success', 'Registro Actualizado Exitósamente');
        } else {
            return redirect('personal')->with('danger', 'Problemas para Mostrar el Registro.');
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
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function informepersonal($id)
    {
        $data = Personal::with('residencia')
                            ->with('referenciaspersonales')
                            ->with('datos_laborales')
                            ->with('enfermedades')
                            ->with('contactos_emergencia')
                            ->with('alergia_medicamentos')
                            ->with('cursos_tecnicos')
                            ->with('carreras_universitarias')
                            ->with('phd')
                            ->with('maestrias')
                            ->with('talleres')
                            ->with('diplomados')
                            ->with('participacion')
                            ->with('historial_laboral')
                            ->where('id', $id)
                            ->first();
        // return $data;
        $pdf = \PDF::loadView('personal.pdf.informepersonal', compact('data'));
        return $pdf->stream('Informe-Personal-'.$data->nombres.'-'.$data->apellidos.'.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfilcurricular($id)
    {
        $data = Personal::where('id', $id)->first();
        $data = Personal::with('residencia')
                            ->with('referenciaspersonales')
                            ->with('datos_laborales')
                            ->with('enfermedades')
                            ->with('contactos_emergencia')
                            ->with('alergia_medicamentos')
                            ->with('cursos_tecnicos')
                            ->with('carreras_universitarias')
                            ->with('phd')
                            ->with('maestrias')
                            ->with('talleres')
                            ->with('diplomados')
                            ->with('participacion')
                            ->with('historial_laboral')
                            ->with('actividad_noprocesada')
                            ->with('integridad_laboral')
                            ->where('id', $id)
                            ->first();
        $pdf = \PDF::loadView('personal.pdf.perfilcurricular', compact('data'));
        return $pdf->stream('Perfil-Curricular-'.$data->nombres.'-'.$data->apellidos.'.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function informeconfidencial($id)
    {
        $data = Personal::with('actividad_noprocesada')
                            ->with('integridad_laboral')
                            ->where('id', $id)
                            ->first();

        $pdf = \PDF::loadView('personal.pdf.informeconfidencial', compact('data'));
        return $pdf->stream('Informe-Confidencial-'.$data->nombres.'-'.$data->apellidos.'.pdf');
    }

    public function getMunicipio($id)
    {
        $municipios = Municipio::where('provincia_id', $id)->get();
        return response()->json($municipios);
    }

}
