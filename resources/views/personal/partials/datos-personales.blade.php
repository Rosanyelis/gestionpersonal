<div class="tab-pane active" id="tabItem5">
    <div class="row gy-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Foto Frontal</label>
                <div class="form-control-wrap">
                    <div class="custom-file">
                        <input name="foto_frontal" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Subir Foto Frontal</label>
                        @if ($errors->has('foto_frontal'))
                            <span class="invalid text-danger">
                                {{ $errors->first('foto_frontal') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Foto Lateral</label>
                <div class="form-control-wrap">
                    <div class="custom-file">
                        <input name="foto_lateral" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Subir Foto Lateral</label>
                        @if ($errors->has('foto_lateral'))
                            <span class="invalid text-danger">
                                {{ $errors->first('foto_lateral') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Cédula</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control " id="fw-vr-first-name" name="cedula"
                        value="{{ old('cedula') }}" placeholder="Ejm: 123456789">
                    @if ($errors->has('cedula'))
                        <span class="invalid text-danger">
                            {{ $errors->first('cedula') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Nombres</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control " id="fw-vr-first-name" name="nombres"
                        value="{{ old('nombres') }}" placeholder="Ejm: Jena Andrea">
                    @if ($errors->has('nombres'))
                        <span class="invalid text-danger">
                            {{ $errors->first('nombres') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-last-name">Apellidos</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="apellidos"
                        value="{{ old('apellidos') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('apellidos'))
                        <span class="invalid text-danger">
                            {{ $errors->first('apellidos') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Apodo</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-apodo" name="apodo"
                        value="{{ old('apodo') }}" placeholder="Ejm: Jena">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-mobile-number">Fecha
                    Nacimiento</label>
                <div class="form-control-wrap">
                    <input type="date" name="fecha_nacimiento" class="form-control"
                        value="{{ old('fecha_nacimiento') }}">
                    @if ($errors->has('fecha_nacimiento'))
                        <span class="invalid text-danger">
                            {{ $errors->first('fecha_nacimiento') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-lugar">Lugar de
                    Nacimiento</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-lugar" name="lugar_nacimiento"
                        value="{{ old('lugar_nacimiento') }}" placeholder="Ejm: Cairo">
                    @if ($errors->has('lugar_nacimiento'))
                        <span class="invalid text-danger">
                            {{ $errors->first('lugar_nacimiento') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="estado_civil">Estado Civil</label>
                <div class="form-control-select">
                    <select class="form-control" name="estado_civil" id="estado_civil">
                        <option value="default_option">Seleccione...</option>
                        <option value="Soltero(a)" @if (old('estado_civil') == 'Soltero(a)') selected @endif>Soltero(a)
                        </option>
                        <option value="Casado(a)" @if (old('estado_civil') == 'Casado(a)') selected @endif>Casado(a)
                        </option>
                        <option value="Viudo(a)" @if (old('estado_civil') == 'Viudo(a)') selected @endif>Viudo(a)
                        </option>
                    </select>
                    @if ($errors->has('estado_civil'))
                        <span class="invalid text-danger">
                            {{ $errors->first('estado_civil') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="nacionalidad">Nacionalidad</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-lugar" name="nacionalidad"
                        value="{{ old('nacionalidad') }}" placeholder="Ejm: Puertorriqueño">
                    @if ($errors->has('nacionalidad'))
                        <span class="invalid text-danger">
                            {{ $errors->first('nacionalidad') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-lugar">Tipo de Sangre</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-lugar" name="tipo_sangre"
                        value="{{ old('tipo_sangre') }}" placeholder="Ejm: ORH+">
                    @if ($errors->has('tipo_sangre'))
                        <span class="invalid text-danger">
                            {{ $errors->first('tipo_sangre') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
