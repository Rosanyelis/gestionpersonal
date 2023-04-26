<div class="tab-pane" id="tabItem7">
    <div class="row gy-3">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Provincia</label>
                <div class="form-control-wrap ">
                    <div class="form-control-select">
                        <select class="form-control" name="provincia" id="provincia">
                            <option>Seleccione</option>
                            @foreach ($provincias as $item)
                                <option value="{{ $item->id }}" @if (old('provincia') == $item->id) selected @endif>{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('provincia'))
                        <span class="invalid text-danger">
                            {{ $errors->first('provincia') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-first-name">Municipio</label>
                <div class="form-control-wrap ">
                    <div class="form-control-select">
                        <select class="form-control" name="municipio" id="municipio">
                            @if (old('municipio'))
                            <option value="{{ old('municipio')}}">{{ old('municipio') }}</option>
                            @else
                            <option>Seleccione</option>
                            @endif
                        </select>
                    </div>
                    @if ($errors->has('municipio'))
                        <span class="invalid text-danger">
                            {{ $errors->first('municipio') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-last-name">Distrito Municipal</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="distrito_municipal"
                        value="{{ old('distrito_municipal') }}">
                    @if ($errors->has('distrito_municipal'))
                        <span class="invalid text-danger">
                            {{ $errors->first('distrito_municipal') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-last-name">Seccion</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="seccion"
                        value="{{ old('seccion') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('seccion'))
                        <span class="invalid text-danger">
                            {{ $errors->first('seccion') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-last-name">Barrio</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="barrio"
                        value="{{ old('barrio') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('barrio'))
                        <span class="invalid text-danger">
                            {{ $errors->first('barrio') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Tipo de Residencia</label>
                <div class="form-control-wrap">
                    <input class="form-control" name="tipo_residencia" id="tipo_residencia"
                        value="{{ old('tipo_residencia') }}" placeholder="Ejm: Apartamento">
                    @if ($errors->has('tipo_residencia'))
                        <span class="invalid text-danger">
                            {{ $errors->first('tipo_residencia') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Calle</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="calle"
                        value="{{ old('calle') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('calle'))
                        <span class="invalid text-danger">
                            {{ $errors->first('calle') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Número</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="numero"
                        value="{{ old('numero') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('numero'))
                        <span class="invalid text-danger">
                            {{ $errors->first('numero') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Coordenadas</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fw-vr-last-name" name="coordenada"
                        value="{{ old('coordenada') }}" placeholder="Ejm: Doe Colin">
                    @if ($errors->has('coordenada'))
                        <span class="invalid text-danger">
                            {{ $errors->first('coordenada') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label text-uppercase" for="fw-vr-apodo">Referencia de
                    Llegada</label>
                <div class="form-control-wrap">
                    <textarea type="text" class="form-control" name="referencia_llegada" id="" cols="10">{{ old('referencia_llegada') }}</textarea>
                    @if ($errors->has('referencia_llegada'))
                        <span class="invalid text-danger">
                            {{ $errors->first('referencia_llegada') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
