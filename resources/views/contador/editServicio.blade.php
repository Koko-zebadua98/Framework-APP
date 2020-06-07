@extends('layouts.app')


@section('content')

<div class="container">
    <h2>Editar Servicio </h2>
    <div class="row justify-content-center">
        <div>
            @if(Auth::user()->role == 2)
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <form action="{{ route('saveNewVersion', $id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                        <input name="nombre" type="text" class="form-control" value="{{ $servicio->nombre }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costo" class="col-sm-3 col-form-label">Costo</label>
                    <div class="col-sm-9">
                        <input name="costo" type="text" class="form-control" id="costo" value="{{ $servicio->costo }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mora" class="col-sm-3 col-form-label">Monto de mora</label>
                    <div class="col-sm-9">
                        <input name="mora" type="text" class="form-control" id="mora" value="{{ $servicio->monto_mora  }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="version" class="col-sm-3 col-form-label">Version Actual</label>
                    <div class="col-sm-9">
                        <input name="version" type="text" class="form-control"  value="{{ $servicio->version }}" readonly>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                <div class="custom-file ">
                    <input type="file" class="custom-file-input" id="profile" name="img1" value="{{ $servicio->img1}}">
                <label class="custom-file-label " for="img1" data-browse="Bestand kiezen" >imagen 1</label>
                    <img src="{{ asset('uploads/servicio/img/'. $servicio->img1) }}" id="imagen" width="100px" class="img-thumbnail" style="margin-bottom: 70%">
                </div>
                        </div>
                        <div class="col-sm-4">
                <div class="custom-file ">
                    <input type="file" class="custom-file-input" id="foto2" name="img2" value="{{ $servicio->img2}}" >
                    <label class="custom-file-label " for="img1" data-browse="Bestand kiezen">imagen 2</label>
                    <img src="{{ asset('uploads/servicio/img/'. $servicio->img2) }}" id="imagen-2" width="100px" class="img-thumbnail">
                </div>
                        </div>
                        <div class="col-sm-4">
                <div class="custom-file ">
                    <input type="file" class="custom-file-input" id="foto3" name="img3" value="{{ $servicio->img3}}">
                    <label class="custom-file-label " for="img1" data-browse="Bestand kiezen">imagen 3</label>
                    <img src="{{ asset('uploads/servicio/img/'. $servicio->img3) }}" id="imagen-3" width="100px" class="img-thumbnail">
                </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Nueva version del servicio </button>
            </form>
        </div>
        @endif
    </div>
    @endsection
