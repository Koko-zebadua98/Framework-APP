@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Nuevo Servicio</h2>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="post" action="{{ route('nuevoServicio') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-9">
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre del servcio">
            </div>
        </div>
        <div class="form-group row">
            <label for="costo" class="col-sm-3 col-form-label">Costo</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="costo" name="costo">
            </div>
        </div>
        <div class="form-group row">
            <label for="mora" class="col-sm-3 col-form-label">Monto de mora</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="mora" name="mora">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
        <div class="custom-file ">
            <input type="file" class="custom-file-input" id="profile" name="img1" >
            <label class="custom-file-label " for="img1" data-browse="Bestand kiezen">buscar imagen 1</label>
            <img src="" id="imagen" width="100px" class="img-thumbnail" style="margin-bottom: 70%">
        </div>
                </div>
                <div class="col-sm-4">
        <div class="custom-file ">
            <input type="file" class="custom-file-input" id="foto2" name="img2" >
            <label class="custom-file-label " for="img1" data-browse="Bestand kiezen">buscar imagen 2</label>
            <img src="" id="imagen-2" width="100px" class="img-thumbnail">
        </div>
                </div>
                <div class="col-sm-4">
        <div class="custom-file ">
            <input type="file" class="custom-file-input" id="foto3" name="img3" >
            <label class="custom-file-label " for="img1" data-browse="Bestand kiezen">buscar imagen 3</label>
            <img src="" id="imagen-3" width="100px" class="img-thumbnail">
        </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="custom-file"> --}}
            {{-- <input type="file" class="custom-file-input" id="img2" name="img2"> --}}
            {{-- <label class="custom-file-label" for="img2" data-browse="Bestand kiezen">buscar imagen 2</label> --}}
            {{-- <img src="" id="profile-img-tag" width="200px" class="img-thumbnail"> --}}
        {{-- </div> --}}
        {{--  --}}
        {{--  --}}
        {{-- <div class="custom-file"> --}}
            {{-- <input type="file" class="custom-file-input" id="img3" name="img3"> --}}
            {{-- <label class="custom-file-label" for="img3" data-browse="Bestand kiezen">buscar imagen 3</label> --}}
            {{-- <img src="" id="profile-img-tag" width="200px" class="img-thumbnail"> --}}
        {{-- </div> --}}
        
        <button class="btn btn-primary mt-3" type="submit" style="margin-top:8%;">Registrar servicio </button>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            function readURL(input, location) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        
                    $(`#${location}`).attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
            }
        }

            $('#profile').change(function() {
                readURL(this, "imagen");
                });
            $('#foto2').change(function() {
                readURL(this, "imagen-2");
                });
            $('#foto3').change(function() {
                readURL(this, "imagen-3");
                });
            

            });
    </script>
</div>


{{-- <h2>Add a game</h2>[]
 
<form method="post" action="/games" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="form-group row">
    <label for="titleid" class="col-sm-3 col-form-label">Game Title</label>
    <div class="col-sm-9">
        <input name="title" type="text" class="form-control" id="titleid" placeholder="Game Title">
    </div>
</div>
<div class="form-group row">
    <label for="publisherid" class="col-sm-3 col-form-label">Game Publisher</label>
    <div class="col-sm-9">
        <input name="publisher" type="text" class="form-control" id="publisherid" placeholder="Game Publisher">
    </div>
</div>
<div class="form-group row">
    <label for="releasedateid" class="col-sm-3 col-form-label">Release Date</label>
    <div class="col-sm-9">
        <input name="releasedate" type="text" class="form-control" id="releasedateid" placeholder="Release Date">
    </div>
</div>
<div class="form-group">
    <label for="gameimageid" class="col-sm-3 col-form-label">Game Image</label>
    <div class="col-sm-9">
        <input name="image" type="file" id="gameimageid" class="custom-file-input">
        <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
    </div>
</div>
<div class="form-group row">
    <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Submit Game</button>
    </div>
</div>

</form>
</div> --}}
@endsection