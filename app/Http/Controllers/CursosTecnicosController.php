<?php

namespace App\Http\Controllers;

use App\Models\CursosTecnicos;
use App\Models\Personal;
use Illuminate\Http\Request;

class CursosTecnicosController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('cursos.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cursos = json_decode($request->Arraycursos);

        $cant = count($cursos);
        if ($cant != 0) {
            foreach ($cursos as $key) {
                $dataM = new CursosTecnicos();
                $dataM->personal_id = $id;
                $dataM->institucion = $key->institucion;
                $dataM->titulo = $key->titulo;
                $dataM->ano = $key->ano;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro de Guardado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/actividades-educativa')->with('error', 'No hay datos que guardar.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $curso_id)
    {
        $data = CursosTecnicos::find($curso_id);
        return view('cursos.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $curso_id)
    {
        $count = Personal::where('id', $id)->count();
        if ($count>0) {
            $carrera = CursosTecnicos::where('personal_id', $id)->where('id', $curso_id)->first();
            $carrera->personal_id = $id;
            $carrera->institucion = $request->institucion;
            $carrera->titulo = $request->titulo;
            $carrera->ano = $request->ano;
            $carrera->save();

            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro de Actualizado Exitósamente');

        } else {
            return redirect('/personal/'.$id.'/actividades-educativa')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $curso_id)
    {
        $count = CursosTecnicos::where('id', $curso_id)->count();
        if ($count>0) {
            $data = CursosTecnicos::where('personal_id', $id)->where('id', $curso_id)->delete();
            return redirect('/personal/'.$id.'/actividades-educativa')->with('success', 'Registro Eliminado Exitosamente');
        } else {
            return redirect('/personal/'.$id.'/actividades-educativa')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }
}
