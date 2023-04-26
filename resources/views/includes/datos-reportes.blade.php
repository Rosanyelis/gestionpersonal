<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Reporte de Actividades No Procesadas</h6>
    </div><!-- .nk-block-head -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th width="50px"><span>#</span></th>
                <th><span>USUARIO</span></th>
                <th><span>FECHA DE CREACIÓN</span></th>
                <th><span>TIPO REPORTE</span></th>
                <th><span>DETALLES</span></th>
                
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @foreach ($data->actividad_noprocesada as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{!! \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i:s A') !!}</td>
                    <td>{{ $item->tipo_reporte }}</td>
                    <td>{{ $item->detalles }}</td>
                    
                </tr><!-- .nk-tb-item -->
            @endforeach
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
