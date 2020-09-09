@extends('layouts.app',["options" => ["breadcrumb" => true, "messages" => true, "sidebar" => true]])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Tela Inicial</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a class="btn btn-primary" href="{{route('artigo.index')}}">
                    <i class="fa fa-list"></i>
                    Lista
                </a>
                <h3><label for="marca">Procure por marcas de carro aqui</label></h3>
                <form method="post" action="{{route("artigo.store")}}">
                    @csrf
                    <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" required placeholder="audi">
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Procurar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if(isset($html))
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
        <div class="card-header">Veículos encontrados</div>
        <div class="card-body" id="iframe">
            
        </div>
    </div>
</div>
@endif
@endsection

@push('script')
<script>
$(document).ready(function() {
    @if(isset($html))
        var pagina = `{!!$html!!}`;
        console.log(pagina);
        $("#iframe").append(`<iframe src>${pagina}</iframe>
    @endif
});
</script>
@endpush