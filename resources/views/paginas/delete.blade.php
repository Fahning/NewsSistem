@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white"><h3>Excluir essa News?</h3></div>
                <div class="card-body">
                    <div class="col-md-12 "><h4 class="d-inline">Titulo do News: </h4><h5 class="d-inline text-primary">{{$noticia->title}}</h5></div>
                    <hr>
                    <div class="col-md-12"><h4 class="d-inline">Conteudo do News: </h4><h5 class="d-inline text-primary">{{$noticia->message}}</h5></div>
                    <br>
                    <div class="col-md-12"><h4 class="d-inline">Tipo do News: </h4><h5 class="d-inline text-primary">
                        @if ($noticia->type == 1)
                            Noticia
                        @elseif ($noticia->type == 2)
                            Atualização
                        @elseif($noticia->type == 3)
                            Evento
                        @endif
                    </h5></div>
                    <br>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6"><a href="{{route('painel')}}" class="btn btn-info btn-block">Voltar</a></div>
                        <div class="col-md-6"><a href="{{ route('destroy', $noticia->id) }}" class="btn btn-danger btn-block">Deletar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection