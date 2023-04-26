<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1 mb-3">
        <h5 class="title text-white text-uppercase">Resultados de Evaluación de Certificado de la Procuraduría</h5>
    </div><!-- .nk-block-head -->
    <div class="row g-3">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Certificado de la Procuraduría</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->certificado_procuraduria))
                        {{ $data->integridad_laboral->certificado_procuraduria }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->resultadop))
                    {{ $data->integridad_laboral->resultadop }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->detallep))
                    {{ $data->integridad_laboral->detallep }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Certificado Institución del Orden</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->certificado_institucion))
                    {{ $data->integridad_laboral->certificado_institucion }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->resultadoi))
                    {{ $data->integridad_laboral->resultadoi }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->integridad_laboral->detallei))
                    {{ $data->integridad_laboral->detallei }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1 mb-3">
        <h5 class="title text-white text-uppercase">Resultados de Investigación Profunda de Vínculos con Actividad Antisocial</h5>
    </div><!-- .nk-block-head -->
    <div class="row g-3">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Certificado de la Procuraduría</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->actividad_antisocial))
                    {{ $data->depuracion_leyes->actividad_antisocial }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->resultadop))
                    {{ $data->depuracion_leyes->resultadop }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->detallep))
                    {{ $data->depuracion_leyes->detallep }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Reporte de Actividades no Procesada</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->reporte_actividad_noprocesada))
                    {{ $data->depuracion_leyes->reporte_actividad_noprocesada }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->resultadoi))
                    {{ $data->depuracion_leyes->resultadoi }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->depuracion_leyes->detallei))
                    {{ $data->depuracion_leyes->detallei }}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1 mb-3">
        <h5 class="title text-white text-uppercase">Resultados de Analítica y Psicometría</h5>
    </div><!-- .nk-block-head -->
    <div class="row g-3">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Prueba Psicométrica</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->prueba_psicometrica))
                    {{ $data->analisis_psicometria->prueba_psicometrica }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->resultadop))
                    {{ $data->analisis_psicometria->resultadop }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->detallep))
                    {{ $data->analisis_psicometria->detallep }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Prueba Enfermedades contagiosas</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->enfermedades_contagiosas))
                    {{ $data->analisis_psicometria->enfermedades_contagiosas }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->resultadoi))
                    {{ $data->analisis_psicometria->resultadoi }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->detallei))
                    {{ $data->analisis_psicometria->detallei }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Prueba abuso consumo alcohol</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->consumo_alcohol))
                    {{ $data->analisis_psicometria->consumo_alcohol }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->resultadoa))
                    {{ $data->analisis_psicometria->resultadoa }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->detallea))
                    {{ $data->analisis_psicometria->detallea }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Consumo de sustancia prohibida</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->sustancia_prohibida))
                    {{ $data->analisis_psicometria->sustancia_prohibida }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->resultados))
                    {{ $data->analisis_psicometria->resultados }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->analisis_psicometria->detalles))
                    {{ $data->analisis_psicometria->detalles }}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1 mb-3">
        <h5 class="title text-white text-uppercase">Resultados de Levantamiento de Campo</h5>
    </div><!-- .nk-block-head -->
    <div class="row g-3">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Visita Domiciliaria</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->visita_domiciliaria))
                    {{ $data->levantamiento_campo->visita_domiciliaria }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadov))
                    {{ $data->levantamiento_campo->resultadov }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detallev))
                    {{ $data->levantamiento_campo->detallev }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Levantamiento coordenado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->levantamiento_coordinado))
                    {{ $data->levantamiento_campo->levantamiento_coordinado }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadol))
                    {{ $data->levantamiento_campo->resultadol }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detallel))
                    {{ $data->levantamiento_campo->detallel }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Investigación de entorno</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->investigacion_entorno))
                    {{ $data->levantamiento_campo->investigacion_entorno }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadoi))
                    {{ $data->levantamiento_campo->resultadoi }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detallei))
                    {{ $data->levantamiento_campo->detallei }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Levantamiento de Dactilares</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->levantamiento_dactilar))
                    {{ $data->levantamiento_campo->levantamiento_dactilar }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadod))
                    {{ $data->levantamiento_campo->resultadod }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detalled))
                    {{ $data->levantamiento_campo->detalled }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Levantamientos de características fotográfica</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->levantamiento_fotografia))
                    {{ $data->levantamiento_campo->levantamiento_fotografia }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadof))
                    {{ $data->levantamiento_campo->resultadof }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detallef))
                    {{ $data->levantamiento_campo->detallef }}
                    @endif
                </div>

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Levantamiento de integridad familiar</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->integridad_familiar))
                    {{ $data->levantamiento_campo->integridad_familiar }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Resultado</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->resultadofa))
                    {{ $data->levantamiento_campo->resultadofa }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="form-label text-uppercase" for="site-name">Detalles</label>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <div class="form-control-wrap">
                    @if (isset($data->levantamiento_campo->detallefa))
                    {{ $data->levantamiento_campo->detallefa }}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div><!-- .nk-block -->
