@extends('layouts.app')



@section('content')
@stack('head')
<link rel="stylesheet" href=" {{ asset('css/switchery.min.css') }} ">
<script src="  {{ asset('js/switchery.min.js') }}"></script>
{{-- toast --}}
<link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
<script src="{{ asset('js/toastr.min.js') }}"></script>

{{-- <link href="{{ asset('css/switch.scss') }}" rel="stylesheet"> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script> --}}

<div class="container">

    
    <h1>Servicios</h1>
    
    <div class="row">
        @foreach ($servicios as $key => $servicio )
        <div class="col-sm-4 d-flex justify-content-center pb-4">
            @if((Auth::user()->role == 1 && $servicio->active != 0) || Auth::user()->role == 2)
            <div class="card" style="width: 14rem;">
                @if(Auth::user()->role == 2)
                <div class="card-header">
                    <label>
                <input class="br" data-id="{{ $servicio->id }}" type="checkbox" value=" {{ $servicio->active }}"  {{ $servicio->active == 1 ? 'checked' : '' }}>
                    <span>  {{ $servicio->active == 1 ? 'Activado' : 'Desactivado' }} </span>
            </label>
                  </div>
                @endif
               
                <div id="{{'intervalosCarusel' .  $key }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="1000">
                            <img src="{{ asset('uploads/servicio/img/'. $servicio->img1) }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item" data-interval="2000">
                            <img src="{{ asset('uploads/servicio/img/'. $servicio->img2) }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/servicio/img/'. $servicio->img3) }}" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href=" {{ '#intervalosCarusel' . $key }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href=" {{ '#intervalosCarusel' . $key }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
                <div class="card-body">
                <h5 class="card-title">{{ $servicio->nombre }}</h5>
                    <p class="card-text">Costo: {{  $servicio->costo }} </p>
                    <p class="card-text">Monto de mora: {{  $servicio->monto_mora }} </p>

                    @if(!Auth::check())
                    <a href=" {{ route('editService', $servicio->id) }} " class="btn btn-primary">Modificar servicio</a>
                    @elseif(Auth::user()->role == 2)
                    <a href=" {{ route('editService', $servicio->id) }} " class="btn btn-primary">Modificar servicio</a>
                     @elseif(Auth::user()->role == 1)
                     @php $vandera = true;
                     @endphp
                        @foreach ($subs as $item)
                            @if($item->id === $servicio->id)
                                {{-- <a href="#" class="btn btn-primary">Detalle de Subscripcion </a>  --}}
                                @php $vandera = false;
                                @endphp
                            @endif
                        @endforeach 
                        @if($vandera)
                        {{-- <a href=" {{ route('subscripcion', $servicio->id) }} " class="btn btn-primary">Subscribirse </a>  --}}
                        <button class="btn btn-primary subscribir" id=" {{ $servicio->id}} ">Subscribirse </button> 
                        <div id="wait" class="spinner" style="display:none;"></div>
                        @endif
                @endif
                
                </div>
            </div>
            @endif
        </div>
        @endforeach
       
    </div>
    <script>
        $(document).ready(function() {
            console.log('listo jquery');
            
            $(".subscribir").click(function(event){
                event.preventDefault();
                console.log('evento click');
                console.log(this.id);
                

                let servicioID = this.id;
                let _token   = $('meta[name="csrf-token"]').attr('content');   
                let snipper = $(document).find('#wait');
                 this.style.display = 'none';
                //  snipper.show()
                $.ajax({
                    url: "account/subscripcion/make",
                    type:"POST",
                    data:{
                    idServicio: servicioID,
                    _token: _token
                    },
                    success:function(response){
                    console.log(response);

                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(response.message);

                    if(response) {
                       console.log('OK - AJAX successful');  
                    }
                    },error: function (response) {
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.error('Algo salio mal'); 
                        
                    }
                });
            }); 

        
        $('.br').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let servicioId = $(this).data('id');

                // $('span').text(status ? 'Off' : 'On');

            $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('status') }}',
                    data: {'status': status, 'servicio_Id': servicioId},
                    success: function (data) {

                        // toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    },error:function(response){
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.error('Algo salio mal'); 
                    }
                });

    });

        });

        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
         let switchery = new Switchery(html,  { size: 'small' });
         switchery.disable();
         switchery.enable();


    });
    </script>
</div>
@endsection
