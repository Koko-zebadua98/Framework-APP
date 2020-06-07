@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pagos</h1>
    <div class="row">
    @foreach ($servicios as $item)
    
  
        <div class="col-sm-4 col-md-4 pb-4">
           <div class="bs-example">
                <div class="card" style="max-width: 500px;">
                    <div class="row no-gutters">
                        <div class="col-sm-5" style="background: #ffff;">
                            <img src="{{ asset('uploads/servicio/img/'. $item->img1) }}"  class="card-img-top h-180" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title" style="color: ">{{ $item->nombre }}</h5>
                            <p class="card-text"> 
                                <strong style="color: #607d8b"> {{ $item->usuario }} </strong> <br>
                                {{ $item->es_hora ? 'Servicio Pagado': 'Servicio No Pagado' }}
                            </p>
                                {{-- <a href="#" class="btn btn-primary stretched-link">View Profile</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   

    @endforeach
</div>
</div>
@endsection