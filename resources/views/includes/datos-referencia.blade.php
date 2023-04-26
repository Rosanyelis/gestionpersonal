<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Referencias Personales /
            Familiares</h6>
            <a href="{{ url('/personal/' . $data->id . '/contactos-de-emergencia/nuevo-contacto') }}"
                class="btn btn-sm btn-primary">
                <em class="icon ni ni-plus-sm"></em>
                <span>Nuevo </span>
            </a>
    </div><!-- .nk-block-head -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th width="50px"><span>#</span></th>
                <th><span>NOMBRE y APELLIDO</span></th>
                <th><span>CÉDULA</span></th>
                <th><span>LUGAR NACIMIENTO</span></th>
                <th><span>TELÉFONO</span></th>
                <th><span>VÍNCULO</span></th>
                <th width="50px"></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @foreach ($data->referenciaspersonales as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->cedula }}</td>
                    <td>{{ $item->lugar_nacimiento }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->vinculo }}</td>
                    <td>
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a
                                                    href="{{ url('/personal/' . $data->id . '/contactos-de-emergencia/' . $item->id . '/editar-contacto') }}"><em
                                                        class="icon ni ni-edit"></em><span>Editar</span></a>
                                            </li>
                                            <li>
                                                <button class="btn delete-record" data-id="{{ $item->id }}">
                                                    <em class="icon ni ni-trash"></em>
                                                    <span>Eliminar
                                                        Contacto</span>
                                                </button>
                                                <form id="formDelete-{{ $item->id }}"
                                                    action="{{ url('/personal/' . $data->id . '/contactos-de-emergencia/' . $item->id . '/eliminar-contacto') }}"method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
