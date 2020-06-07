@extends('layouts.app')


@section('content')

<h1> Subscritor: {{$subs[0]->nombre}} </h1>
<div class="container">
        <div class="row">
        <div class="col-sm d-flex justify-content-center pb-4">
<div class="card" style="width: 24rem;">
    <div class="card-header">Datos personales</div>
        <div class="card-body">
            <form>
                @csrf

                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ $subs[0]->nombre }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">RFC</label>
                    <div class="col-sm-9">
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ $subs[0]->rfc }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Direccion</label>
                    <div class="col-sm-9">
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ $subs[0]->direccion }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Correo</label>
                    <div class="col-sm-9">
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ $subs[0]->email }}" readonly>
                    </div>
                </div>
        </div>
    </div>
        </div>
        <div class="col-sm-5">
    <div class="card" style="width: 17rem;">
        <div class="card-header">Historial de Pagos</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Pagos</label>
                    <div class="col-sm-8">
                    {{-- <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ __('')}}" readonly> --}}
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <a href="{{ route('subscritor-pagos',$subs[0]->id) }}" class="btn btn-primary" >detalle de pagos</a>
            </div>
    </div>
</div>
    {{-- <div class="col-sm-5 mt-4">
    <div class="card" style="width: 17rem;" class="pl-2" >
        <div class="card-header">Pagos recientes</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Pagos</label>
                    <div class="col-sm-8">
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="{{ __('10')}}" readonly>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <a href="{{ route('subscritor-pagos',$subs[0]->id) }}" class="btn btn-primary" >detalle de pagos</a>
            </div>
    </div>
</div> --}}
    </div>
@endsection