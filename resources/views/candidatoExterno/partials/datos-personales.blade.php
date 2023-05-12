<div class="nk-block">

    <div class="profile-ud-list">
        <div class="profile-ud-item">
            <div class="profile-ud wider">
                <span class="profile-ud-label text-uppercase">Cédula</span>
                <span class="profile-ud-value">{{ $data->cedula }}</span>
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
    </div><!-- .profile-ud-list -->
</div>
