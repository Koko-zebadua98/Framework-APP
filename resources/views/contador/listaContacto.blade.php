@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de contactos</h2>
    <div class="row"></div>
    <div class="col-xs-4 d-flex justify-content-md-center">
        <div class="card">
            <div class="card-header">
                Contactos
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        {{-- <th scope="col">Accion</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $key => $contacto)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td> {{$contacto->nombre}} </td>
                        <td> {{ $contacto->telefono }} </td>
                        {{-- <td> --}}
                            {{-- <button type="button" id="myInput" class="btn btn-primary">Editar</button> --}}
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Editar
                            </button> --}}
                        {{-- </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar {{ 'nombre_' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    .
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Salvar cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .table td {
        text-align: center;
    }

</style>
