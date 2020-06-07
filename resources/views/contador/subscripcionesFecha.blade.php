@extends('layouts.app')

@prepend('styles')
<!-- Datepicker Files -->
<!-- Datepicker Files -->
<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
@endprepend
@stack('styles')
@section('content')


<h1>Subscripciones por fecha</h1>
<div class="container">
    <form method="POST" action="{{ route('subscripcionesPorfecha') }}">
        @csrf
        <div class="mb-4">
            <div class="form-group">
                <label for="date">Fecha</label>
                <div class="input-group">
                    <input type="text" class="form-control datepicker" id="fecha" name="fecha">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-default btn-primary" type="submit">Buscar</button>

        </div>
    </form>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subscripcion</th>
                <th scope="col">Cliente</th>
                <th scope="col">Servicio</th>
                <th scope="col">Costo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subscriptions as $key => $sub)
            <tr>
                <th scope="row"> {{ ++$key}} </th>
                <td>{{ $sub->subscripcion }}</td>
                <td>{{ $sub->cliente}}</td>
                <td> {{ $sub->servicio }} </td>
                <td> {{ $sub->costo }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@stop

<script type="text/javascript">
    var fecha = '';
    jQuery(document).ready(function ($) {
        $('.datepicker').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
        });
    });
</script>