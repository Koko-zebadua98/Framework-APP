@extends('layouts.app')

@section('content')
<h1>Historial de pagos</h1>

<div class="container">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">fecha de pago</th>
                <th scope="col">Servicio</th>
                <th scope="col">costo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pagos as $key => $pago)
            <tr>
                <th scope="row"> {{ ++$key}} </th>
                <td>{{ $pago->fecha }}</td>
                <td>{{ $pago->servicio}}</td>
                <td> {{ $pago->costo }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection