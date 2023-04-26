<div class="nk-block">
    <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
        <h5 class="title text-white text-uppercase ">Información de Residencia
        </h5>
        <a href="{{ url('/personal/' . $data->id . '/residencia/' . $data->residencia->id . '/editar-residencia') }}"
            class="btn btn-sm btn-primary ">
            <em class="icon ni ni-edit-alt-fill"></em>
            <span>Editar</span>
        </a>
    </div>

    <div class="profile-ud-list mt-1">
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Provincia</span>
                <span class="profile-ud-value">{{ $data->residencia->provincia }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Municipio</span>
                <span class="profile-ud-value">{{ $data->residencia->municipio }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Distrito Municipal</span>
                <span class="profile-ud-value">{{ $data->residencia->distrito_municipal }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Seccion</span>
                <span class="profile-ud-value">{{ $data->residencia->seccion }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Barrio</span>
                <span class="profile-ud-value">{{ $data->residencia->barrio }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Tipo de Residencia</span>
                <span class="profile-ud-value">{{ $data->residencia->tipo_residencia }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Calle</span>
                <span class="profile-ud-value">{{ $data->residencia->calle }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Número</span>
                <span class="profile-ud-value">{{ $data->residencia->numero }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Coordenada</span>
                <span class="profile-ud-value">{{ $data->residencia->coordenada }}</span>
            </div>
        </div>
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Referencia de Llegada</span>
                <span class="profile-ud-value">{{ $data->residencia->referencia_llegada }}</span>
            </div>
        </div>
    </div>
</div>
