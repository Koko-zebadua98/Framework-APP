@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MENU</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->role == 1)
                    es subscritor
                    @elseif(Auth::user()->role == 2)
                    es contador
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection