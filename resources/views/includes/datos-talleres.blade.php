<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase">Talleres</h5>
    </div><!-- .nk-block-head -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th width="50px"><span>#</span></th>
                <th><span>INSTITUCIÓN</span></th>
                <th><span>TITULO</span></th>
                <th><span>AÑO</span></th>
            </tr>
        </thead><!-- .nk-tb-item -->
        <tbody>
            @foreach ($data->talleres as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->institucion }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->ano }}</td>
                </tr><!-- .nk-tb-item -->
            @endforeach
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
