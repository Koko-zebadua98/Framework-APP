@extends('layouts.app')


@section('content')

<div class="container">
    <h2>Subscritores</h2>
    @foreach ($subs as $subscritor)
    <div class="card mb-2 ml-1" style="width: 19rem; margin-top:5px;">
        <div class="card-body">
            <h5 class="card-title">{{ $subscritor->nombre }}</h5>
            <p class="card-text">RFC: {{ $subscritor->rfc }}</p>
            <a href="{{ route('subscritor', $subscritor->id) }}" class="btn btn-primary">ver detalles</a>
        </div>
    </div>
    @endforeach

</div>

@endsection