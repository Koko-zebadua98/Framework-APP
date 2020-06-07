@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estado de cuenta</h2>
    <div class="d-flex justify-content-center">


        <div class="card" style="width: 26rem;">
            <div class="card-header">
                Saldo actual
            </div>
            <form method="post" action=" {{ route('cuentaUpdate') }} ">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            Saldo Actual
                        </div>
                        <div class="col-sm-4">
                            <input id="saldo" name="saldo" type="text" value=" {{ $saldo }} ">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="update" disabled >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() { 
            $("#saldo").click(function() { 
                $( "#update" ).prop( "disabled", false );
            }); 
        }); 
    </script>
    {{-- <script>
        $("#update").click(function (e) {
            e.preventDefault();
            var saldoT = $('#saldo').val();
            var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
            var data={saldo:saldoT,_token:token};
            var ajaxurl = '{{ url('account/cuenta ') }}';
            $.ajax({
                 type: "post",
                 url: ajaxurl , // ó {{url(/admin/empresa)}} depende a tu peticion se dirigira a el index(get) o tu store(post) de tu controlador 
                 data: data,
                 success: function (msg) {
                    alert("Se ha realizado el POST con exito "+msg);
        }
    });
});
        </script>   --}}
</div>

@endsection


