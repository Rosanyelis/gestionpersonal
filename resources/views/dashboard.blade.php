@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Inicio</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="text-uppercase">Bienvenido</h1>
                                @role('Empresa')
                                <h3>{{ Auth::user()->empresa }}</h3>
                                <h4>Sr(a). {{ Auth::user()->name }}</h4>
                                @endrole
                                @role('Desarrollador|Administrador')
                                <h4>Sr(a). {{ Auth::user()->name }}</h4>
                                @endrole

                            </div>
                            <!-- <div class="col-md-12 text-center">
                                <img src="{{ asset('images/CITECSA.png') }}" width="70%" alt="logo CITECSA">
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
