

@extends('layouts.app')

@section('content')

@stack('head')
<script src=" {{ asset('js/slimselect.min.js') }} "></script>
<link href=" {{ asset('css/slimselect.min.css') }} " rel="stylesheet"></link>

<div class="container">
    <h2>Envio de Mensaje</h2>

{{-- <form action="{{ route('mensajeria.store') }}"> --}}
<form action="{{ route('mensajeria.store') }}"  method="POST">
    @csrf
    <div class="form-group">
        <label for="Subject" > Asunto </label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>

    <div class="form-group">
        <label>Seleccione a quién enviar</label>
        <select name="contactos[]" multiple id="slim-select">
            @foreach ($contactos as $contacto)
        <option value=" {{ $contacto->email }}"> {{ $contacto->email }} </option>
            @endforeach
        </select>
        
    </div>
        
    <div class="form-group">
    <label for="contenido"> contenido:</label>  
    <textarea type="text" name="contenido" id="contenido" class="form-control" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary"> Enviar </button>
</form>


<script>
    $(document).ready(function(){
        
        new SlimSelect({
            select: '#slim-select',
            searchText: 'Elegir correos',
    })

    });
    </script>
</div>
@endsection