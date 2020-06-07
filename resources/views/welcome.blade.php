<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <!-- Styles --> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">  </script> --}}

    
    {{-- Jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> --}}
<script src="{{ asset('js/popper.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}
    <style>
          #tooltip {
    background-color: #333;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 13px;
  },
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 10vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    .espacio {
        padding-top: 40em
    }

    .spaceing{
        padding-bottom: 25px;
    }


    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Registro</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    {{-- <div class="container"> --}}
        
        <div class="content">
            <div class="row ">
                @foreach ($servicios as $servicio )
                @if( $servicio->active != 0)
                <div class="col-sm-4 flex-center spaceing">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('uploads/servicio/img/'. $servicio->img1) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $servicio->nombre }}</h5>
                        <p class="card-text">Costo: {{  $servicio->costo }} </p>
                        <p class="card-text">Monto de mora: {{  $servicio->monto_mora }} </p>
                        @guest
                        <a href="#" class="btn btn-primary">Subcribirce</a>
                        {{-- <button type="button" class="btn btn-lg btn-danger" id='popper' data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button> --}}
                        {{-- <button id="button" aria-describedby="tooltip">I'm a button</button> --}}
                        {{-- <div id="tooltip" role="tooltip">I'm a tooltip</div> --}}
                        @endguest
                       @auth
                       @if(Auth::user()->role == 1)
                       es subscritor
                       @elseif(Auth::user()->role == 2)
                       es contador
                       @endif
                       @endauth
                    </div>
                </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    {{-- </div> --}}
</body>

</html>
{{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
<script>

var detectar = function(){
    let a = document.getElementById('popper')
    a.popper()
}
</script>