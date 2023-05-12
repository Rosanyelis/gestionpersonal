<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">PHDs</h5>
        <a href="{{ url('/personal/' . $data->id . '/phds/nuevo-phd') }}"
            class="btn btn-sm btn-primary">
            <em class="icon ni ni-plus-sm"></em>
            <span>Nuevo</span>
        </a>
    </div><!-- .nk-block-head -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th width="50px"><span>#</span></th>
                <th><span>INSTITUCIÓN</span></th>
                <th><span>TITULO</span></th>
                <th><span>AÑO</span></th>
                <th width="50px"></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @foreach ($data->phd as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->institucion }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->ano }}</td>
                    <td>
                    <ul class="nk-tb-actions gx-1 my-n1">
                        <li class="mr-n1">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a
                                                href="{{ url('/personal/' . $data->id . '/phds/' . $item->id . '/editar-phd') }}">
                                                <em class="icon ni ni-edit"></em>
                                                <span>Editar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button class="btn delete-record" data-id="{{ $item->id }}">
                                                <em class="icon ni ni-trash"></em>
                                                <span>Eliminar
                                                    PHD's</span>
                                            </button>
                                            <form id="formDelete-{{ $item->id }}"
                                                action="{{ url('/personal/' . $data->id . '/phds/' . $item->id . '/eliminar-phd') }}"method="POST">
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
