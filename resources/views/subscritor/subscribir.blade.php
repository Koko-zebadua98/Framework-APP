@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Subscripcion al servicio: {{$servicio[0]->nombre}}   </h2>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 21rem;">
            <div class="card-header">
                Cuenta
            </div>
            <form method="post" action="{{ route('Dosubscripcion', $servicio[0]->id) }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            Monto
                        </div>
                        <div class="col-sm-4">
                            <input name="costo" type="text" value=" {{ $servicio[0]->costo }} " readonly>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Confirmar Subscripcion</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
</div>
@endsection
