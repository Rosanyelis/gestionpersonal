<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase ">Información Personal</h5>
        <a href="{{ url('/personal/'.$data->id.'/editar-personal') }}" class="btn btn-sm btn-primary ">
            <em class="icon ni ni-edit-alt-fill"></em>
            <span>Editar</span>
        </a>
    </div>
    <div class="profile-ud-list">
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Cédula</span>
                <span class="profile-ud-value">{{ $data->cedula }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Apodo</span>
                <span class="profile-ud-value">{{ $data->apodo }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Nombres</span>
                <span class="profile-ud-value">{{ $data->nombres }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Apellidos</span>
                <span class="profile-ud-value">{{ $data->apellidos }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Estado Civil</span>
                <span class="profile-ud-value">{{ $data->estado_civil }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Nacionalidad</span>
                <span class="profile-ud-value">{{ $data->nacionalidad }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Lugar de Nacimiento</span>
                <span class="profile-ud-value">{{ $data->lugar_nacimiento }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Fecha de Nacimiento</span>
                <span class="profile-ud-value">{{ $data->fecha_nacimiento }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Edad</span>
                <span class="profile-ud-value">{{ \Carbon\Carbon::createFromDate($data->fecha_nacimiento)->age }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Tipo de Sangre</span>
                <span class="profile-ud-value">{{ $data->tipo_sangre }}</span>
            </div>
        </div>
    </div><!-- .profile-ud-list -->
</div>
