@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column ">
        <div class="d-flex justify-content-center">
            @if($subs != [])
            <div class="card">
                <div class="card-header">
                    Subscripciones 
                </div>
                
                <div class="card-body">
                    <div class="row">
                    @foreach ($subs as $item )
                   
                <div class="col-sm-4">
                    <div class="card mb-3" style="width: 17rem; ">
                        <div class="card-body">
                            <form method="POST" action=" {{ route('subs-pay', $item->id) }} ">
                                @csrf
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-4 col-form-label">Servicio</label>
                                    <div class="col-sm-8">
                                        <input name="nombre" type="text" class="form-control" id="nombre"
                                            placeholder="{{ __('10')}}" value=" {{ $item->nombre }} " readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="costo" class="col-sm-4 col-form-label">Fecha pago</label>
                                    <div class="col-sm-8">
                                        <input name="costo" type="text" class="form-control" id="costo"
                                            placeholder="{{ __('10')}}" value=" {{ $item->renovacion}} " readonly>
                                        {{-- <div class="alert alert-warning" role="alert">
                                        ¡Faltan 3 dias!
                                    </div> --}}
                                    </div>
                                </div>

                                @if(!$item->es_hora)
                                <div class="form-group row">
                                    <label for="pago" class="col-sm-4 col-form-label">Costo</label>
                                    <div class="col-sm-8">
                                        <input name="pago" type="text" class="form-control" id="pago"
                                            placeholder="{{ __('10')}}"
                                            value=" {{ $item->costo }}  + {{ $item->monto_mora }} " readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pago_total" class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                        <input name="pago_total" type="text" class="form-control" id="pago_total"
                                            placeholder="{{ __('10')}}" value=" {{ $item->costo + $item->monto_mora }}"
                                            readonly>
                                    </div>
                                </div>
                                @else

                                <div class="form-group row">
                                    <label for="pago" class="col-sm-4 col-form-label">Costo</label>
                                    <div class="col-sm-8">
                                        <input name="pago_total" type="text" class="form-control" id="nombre"
                                            placeholder="{{ __('10')}}" value=" {{ $item->costo }}" readonly>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row col-sm-13 ml-1">
                                    <div class="justify-content-center">
                                        @if(!$item->es_hora)
                                        <div class="alert alert-danger" role="alert">
                                            ¡Ha superado la fecha limite!
                                        </div>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit"> pagar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                    @endforeach
                </div>
                </div>
            </div>
            
            @else
            <div class="alert alert-warning" role="alert">
                No cuenta con ninguna Subscripcion
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
