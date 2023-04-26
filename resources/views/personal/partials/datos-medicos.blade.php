<div class="tab-pane" id="tabItem6">
    <div class="row gy-3 mt-2">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label text-uppercase">Padece alguna Enfermedad?</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="enfermedadSi" name="enfermedad" class="custom-control-input" value="Si">
                    <label class="custom-control-label" for="enfermedadSi">Si</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="enfermedadNo" name="enfermedad" class="custom-control-input"
                        value="No">
                    <label class="custom-control-label" for="enfermedadNo">No</label>
                </div>
                @if ($errors->has('enfermedad'))
                    <span class="invalid text-danger">
                        {{ $errors->first('enfermedad') }}
                    </span>
                @endif
            </div>
        </div>
        <div id="enfermedades" class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-label text-uppercase">Enfermedad</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="enfermedades[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success mt-4 aggEnfermedad">
                        <em class="icon ni ni-plus-round-fill"></em> Agregar
                        Enfermedad</button>
                </div>
                <div class="w-100"></div>
            </div>
        </div><!-- .row -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label text-uppercase">Posee alergia a algún medicamento?</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="medicamentoSi" name="medicamento" class="custom-control-input"
                        value="Si">
                    <label class="custom-control-label" for="medicamentoSi">Si</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="medicamentoNo" name="medicamento" class="custom-control-input"
                        value="No">
                    <label class="custom-control-label" for="medicamentoNo">No</label>
                </div>
            </div>
            @if ($errors->has('medicamento'))
                <span class="invalid text-danger">
                    {{ $errors->first('medicamento') }}
                </span>
            @endif
        </div>
        <div id="alergias" class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-label text-uppercase">Medicamento</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="alergias[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success mt-4 aggAlergia">
                        <em class="icon ni ni-plus-round-fill"></em> Agregar Alergías</button>
                </div>
                <div class="w-100"></div>
            </div>
        </div><!-- .row -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label text-uppercase">Tiene contactos de emergencia?</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="contactoSi" name="contacto" class="custom-control-input" value="Si">
                    <label class="custom-control-label" for="contactoSi">Si</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="contactoNo" name="contacto" class="custom-control-input" value="No">
                    <label class="custom-control-label" for="contactoNo">No</label>
                </div>
            </div>
            @if ($errors->has('contacto'))
                <span class="invalid text-danger">
                    {{ $errors->first('contacto') }}
                </span>
            @endif
        </div>
        <div id="contactoEmergencia" class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label text-uppercase">Nombre y Apellido</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="contactos[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label text-uppercase">Teléfono</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="telefonos[]">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success mt-4 aggContacto">
                        <em class="icon ni ni-plus-round-fill"></em> Agregar Contacto</button>
                </div>
                <div class="w-100"></div>
            </div>
        </div><!-- .row -->
    </div>
</div>
