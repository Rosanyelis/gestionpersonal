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
            'barrio.required' => 'El campo Barrio es obligatorio',

        ]);

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
        return view('personal.capacidadeducativa', compact('data'));
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

            $reg = new CertificadoIntegridadLaboral();
            $reg->personal_id = $id;
            $reg->certificado_procuraduria = $request->certificado_procuraduria;
            $reg->resultadop = $request->resultadop;
            $reg->detallep = $request->detallep;
            $reg->certificado_institucion = $request->certificado_institucion;
            $reg->resultadoi = $request->resultadoi;
            $reg->detallei = $request->detallei;
            $reg->save();

            $dat = new InvestigacionDepuracionLeyes();
            $dat->personal_id = $id;
            $dat->actividad_antisocial = $request->actividad_antisocial;
            $dat->resultadop = $request->resultadop1;
            $dat->detallep = $request->detallep1;
            $dat->reporte_actividad_noprocesada = $request->reporte_actividad_noprocesada;
            $dat->resultadoi = $request->resultadoi2;
            $dat->detallei = $request->detallei2;
            $dat->save();

            $pru = new AnaliticaPsicometria();
            $pru->personal_id = $id;
            $pru->prueba_psicometrica = $request->prueba_psicometrica;
            $pru->resultadop = $request->resultadop3;
            $pru->detallep = $request->detallep3;
            $pru->enfermedades_contagiosas = $request->enfermedades_contagiosas;
            $pru->resultadoi = $request->resultadoi4;
            $pru->detallei = $request->detallei4;
            $pru->consumo_alcohol = $request->consumo_alcohol;
            $pru->resultadoa = $request->resultadoi5;
            $pru->detallea = $request->detallei5;
            $pru->sustancia_prohibida = $request->sustancia_prohibida;
            $pru->resultados = $request->resultadoi6;
            $pru->detalles = $request->detallei6;
            $pru->save();

            $lev = new LevantamientoCampo();
            $lev->personal_id = $id;
            $lev->visita_domiciliaria = $request->visita_domiciliaria;
            $lev->resultadov = $request->resultadoi7;
            $lev->detallev = $request->detallei7;
            $lev->levantamiento_coordinado = $request->levantamiento_coordinado;
            $lev->resultadol = $request->resultadoi8;
            $lev->detallel = $request->detallei8;
            $lev->investigacion_entorno = $request->investigacion_entorno;
            $lev->resultadoi = $request->resultadoi9;
            $lev->detallei = $request->detallei9;
            $lev->levantamiento_dactilar = $request->levantamiento_dactilar;
            $lev->resultadod = $request->resultadoi10;
            $lev->detalled = $request->detallei10;
            $lev->levantamiento_fotografia = $request->levantamiento_fotografia;
            $lev->resultadof = $request->resultadoi11;
            $lev->detallef = $request->detallei11;
            $lev->integridad_familiar = $request->integridad_familiar;
            $lev->resultadofa = $request->resultadoi12;
            $lev->detallefa = $request->detallei12;
            $lev->save();

            return redirect('/personal/'.$id.'/investigacion-laboral')->with('success', 'Registro de Información Confidencial Guardado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/investigacion-laboral')->with('danger', 'Problemas para Mostrar el Registro.');
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

            $registro = Personal::where('id', $id)->first();
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
        $data = Personal::where('id', $id)->first();

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
        $data = Personal::where('id', $id)->first();

        $pdf = \PDF::loadView('personal.pdf.informeconfidencial', compact('data'));
        return $pdf->stream('Informe-Confidencial-'.$data->nombres.'-'.$data->apellidos.'.pdf');
    }

    public function getMunicipio($id)
    {
        $municipios = Municipio::where('provincia_id', $id)->get();
        return response()->json($municipios);
    }

}
