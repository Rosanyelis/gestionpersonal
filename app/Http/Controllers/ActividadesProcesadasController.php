<?php

namespace App\Http\Controllers;

use App\Models\ReporteActividadNoProcesada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadesProcesadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = ReporteActividadNoProcesada::where('personal_id', $id)->get();
        return view('actividadesProcesadas.index', compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('actividadesProcesadas.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $reporte = json_decode($request->ArrayReporte);

        $cant = count($reporte);
        if ($cant != 0) {
            foreach ($reporte as $key) {
                $dataM = new ReporteActividadNoProcesada();
                $dataM->user_id = Auth::user()->id;
                $dataM->personal_id = $id;
                $dataM->tipo_reporte = $key->tipo;
                $dataM->detalles = $key->detalle;
                $dataM->save();
            }

            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('success', 'Registro de Guardado Exitósamente');
        }else{
            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('error', 'No hay datos que guardar.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $reporte_id)
    {
        $count = ReporteActividadNoProcesada::where('id', $reporte_id)->count();
        if ($count>0) {
            $data = ReporteActividadNoProcesada::where('id', $reporte_id)->where('personal_id', $id)->first();
            return view('actividadesProcesadas.show', compact('data', 'id'));
        } else {
            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $reporte_id)
    {
        $count = ReporteActividadNoProcesada::where('id', $reporte_id)->count();
        if ($count>0) {
            $data = ReporteActividadNoProcesada::where('id', $reporte_id)->where('personal_id', $id)->first();
            return view('actividadesProcesadas.edit', compact('data', 'id'));
        } else {
            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $reporte_id)
    {
        $count = ReporteActividadNoProcesada::where('id', $id)->count();
        if ($count>0) {
            $registro = ReporteActividadNoProcesada::where('id', $id)->first();
            $registro->tipo_reporte = $request->tipo;
            $registro->detalles = $request->detalle;
            $registro->save();

            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('success', 'Se ha Actualizado con éxito');
        } else {
            return redirect('/personal/'.$id.'/actividades-no-procesadas')->with('error', 'Problemas para Mostrar el Registro.');
        }
    }

}
