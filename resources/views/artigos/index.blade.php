@extends('layouts.app',["options"=> ["breadcrumb" => true, "messages" => true, "sidebar" => true]])
@push("style")
<style>
    #carros ul{
        list-style-type: none;
        display: flex;
        flex-flow: row wrap;
    }
    #carros ul li{
        flex-basis: 45%;
        border-radius: 5px;
        background-color: #ccc;
        padding: 5px;
        margin: 5px;
    }
</style>
@endpush
@section('content')
<div class="page-header">
    <h2 class="text-success"><b>Artigos</b>
        <a class="btn btn-success pull-right" href="/home">
            <i class="fa fa-plus"></i>
            Adicionar
        </a>
    </h2>
</div>
<div class="row" id="carros">
@foreach ($artigos as $item)
    <div class="col-6 mt-1">
        <div class="card">
            <div class="card-header"><a href="{{$item->link}}" target="_blank">{{$item->nome_veiculo}}</a></div>
            <div class="card-body">
                <ul class="estilo">
                    <li>
                        <b>Ano:</b> {{$item->ano}}
                    </li>
                    <li>
                        <b>Quilometragem:</b> {{$item->quilometragem}}
                    </li>
                    <li>
                        <b>Combustível:</b> {{$item->combustivel}}
                    </li>
                    <li>
                        <b>Câmbio:</b> {{$item->cambio}}
                    </li>
                    <li>
                        <b>Portas:</b> {{$item->portas}}
                    </li>
                    <li>
                        <b>Cor:</b> {{$item->cor}}
                    </li>
                </ul>
                <form method="POST" action="{{route("artigo.destroy",$item->id)}}" accept-charset="UTF-8" style="display:inline;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm ml-5" style="width: 85%;" title="Excluir" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt" aria-hidden="true"></i> Excluir</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>
{{ $artigos->links() }}

@endsection