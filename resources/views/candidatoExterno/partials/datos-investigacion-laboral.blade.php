<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Resultados de Investigación  de Integridad Laboral</h6>
            <a href="{{ url('/candidatos-externos/' . $data->id . '/integridad-laboral/nueva-evaluacion') }}"
                class="btn btn-sm btn-primary">
                <em class="icon ni ni-plus-sm"></em>
                <span>Nuevo </span>
            </a>
    </div><!-- .nk-block-head -->
    <table class="table mt-4">
        <thead>
            <tr class="text-uppercase">
                <th><span>Nombre y Apellido</span></th>
                <th><span>Cédula</span></th>
                <th><span>Fecha de Nacimiento </span></th>
                <th><span>Edad </span></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            <tr>
                <td>{{ $data->nombres }} {{ $data->apellidos }}</td>
                <td>{{ $data->cedula }}</td>
                <td>{{ $data->fecha_nacimiento }}</td>
                <td>{{ \Carbon\Carbon::createFromDate($data->fecha_nacimiento)->age }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table mt-4">
        <thead>
            <tr class="text-uppercase">
                <th width="50px"><span>#</span></th>
                <th><span>FECHA</span></th>
                <th><span>Empresa </span></th>
                <th><span>Sucursal </span></th>
                <th><span>Autorizado </span></th>
                <th><span>Resultado </span></th>
                <th><span>Detalles </span></th>
                <th width="50px"></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @foreach ($data->integridad_laboral as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->empresa }}</td>
                    <td>{{ $item->sucursal }}</td>
                    <td>{{ $item->autorizado }}</td>
                    <td>{{ $item->resultado }}</td>
                    <td>{{ $item->detalle }}</td>
                    <td>
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a
                                                    href="{{ url('/candidatos-externos/' . $data->id . '/integridad-laboral/' . $item->id . '/ver-evaluacion') }}"><em
                                                        class="icon ni ni-eye"></em><span>Ver</span></a>
                                            </li>
                                            <li><a
                                                    href="{{ url('/candidatos-externos/' . $data->id . '/integridad-laboral/' . $item->id . '/editar-evaluacion') }}"><em
                                                        class="icon ni ni-edit"></em><span>Editar</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                </tr><!-- .nk-tb-item -->
            @endforeach
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
