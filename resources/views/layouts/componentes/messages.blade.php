<!--@if(session('sucesso'))
    <div id="alert" class="alert alert-success" role="alert">
        {{session('sucesso')}}
    </div>

@elseif(session('erro'))

    <div id="alert" class="alert alert-danger" role="alert">
        {{session('erro')}}
    </div>
@elseif(session('mensagem'))
<div id="alert" class="alert alert-success" role="alert">
    {{session('mensagem')}}
</div>
@elseif(session('info'))
    <div id="alert" class="alert alert-info" role="alert">
        {{session('info')}}
    </div>

@endif
-->
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:black;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif