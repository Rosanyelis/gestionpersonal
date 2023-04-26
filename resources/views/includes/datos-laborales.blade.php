<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase ">Estatus Laboral</h5>
    </div>
    <div class="profile-ud-list">
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Estatus</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->estatus_laboral))
                    {{ $data->datos_laborales->estatus_laboral }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Disponibilidad</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->disponibilidad))
                    {{ $data->datos_laborales->disponibilidad }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Rango Horario</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->rango_hora))
                    {{ $data->datos_laborales->rango_hora }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Cantidad de Horas</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->cantidad_hora))
                    {{ $data->datos_laborales->cantidad_hora }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Labor</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->nombre_labor))
                    {{ $data->datos_laborales->nombre_labor }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Técnica</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->nombre_labor))
                    {{ $data->datos_laborales->nombre_labor }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Profesional</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->profesional))
                    {{ $data->datos_laborales->profesional }}
                    @endif
                </span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Tiempo de experiencia</span>
                <span class="profile-ud-value">
                    @if(isset($data->datos_laborales->tiempo_experiencia))
                    {{ $data->datos_laborales->tiempo_experiencia }}
                    @endif
                </span>
            </div>
        </div>
    </div><!-- .profile-ud-list -->
</div>
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Trabajo Actual</h5>
    </div><!-- .nk-block-head -->
    <table class="table mt-3">
        <thead class="text-uppercase">
            <tr>
                <th><span>Empresa</span></th>
                <th><span>Jefe Inmediato</span></th>
                <th><span>Teléfono</span></th>
                <th><span>AÑO</span></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            <tr>
                <td>
                    @if(isset($data->datos_laborales->empresa))
                    {{ $data->datos_laborales->empresa }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->jefe_inmediato))
                    {{ $data->datos_laborales->jefe_inmediato }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->telefono))
                    {{ $data->datos_laborales->telefono }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->ano))
                    {{ $data->datos_laborales->ano }}
                    @endif
                </td>
            </tr><!-- .nk-tb-item -->
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Trabajo Anterior</h5>
    </div><!-- .nk-block-head -->
    <table class="table mt-3">
        <thead class="text-uppercase">
            <tr>
                <th><span>Empresa</span></th>
                <th><span>Jefe Inmediato</span></th>
                <th><span>Teléfono</span></th>
                <th><span>AÑO</span></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            <tr>
                <td>
                    @if(isset($data->datos_laborales->empresa_old))
                    {{ $data->datos_laborales->empresa_old }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->jefe_inmediato_old))
                    {{ $data->datos_laborales->jefe_inmediato_old }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->telefono_old))
                    {{ $data->datos_laborales->telefono_old }}
                    @endif
                </td>
                <td>
                    @if(isset($data->datos_laborales->ano_old))
                    {{ $data->datos_laborales->ano_old }}
                    @endif
                </td>
            </tr><!-- .nk-tb-item -->
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Experiencia Laboral</h5>
    </div><!-- .nk-block-head -->
    <table class="table mt-3">
        <thead class="text-uppercase">
            <tr>
                <th><span>Empresa</span></th>
                <th><span>Años de Entrada</span></th>
                <th><span>Cantidad de Años</span></th>
                <th><span>Cantidad de Meses</span></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @if ($data->historial_laboral)
            @foreach ($data->historial_laboral as $item)
            <tr>
                <td>{{ $item->empresa }}</td>
                <td>{{ $item->ano_entrada }}</td>
                <td>{{ $item->cantidad_ano }}</td>
                <td>{{ $item->cantidad_meses }}</td>
            </tr><!-- .nk-tb-item -->
            @endforeach
            @endif
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
