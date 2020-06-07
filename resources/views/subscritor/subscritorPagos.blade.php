@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Pagos realizados</h1>
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
            @foreach ($pays as $key => $pago)
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