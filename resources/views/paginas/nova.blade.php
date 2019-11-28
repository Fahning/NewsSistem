@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-md-6"><h3>Adicionar</h3></div>
                        <div class="col-md-6 text-right"><a href="{{ route('painel') }}" class="btn btn-danger">Voltar</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group mx-auto">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titulo da Noticia">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Mensagem da noticia" id="" cols="30" rows="10"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                              <label for=""></label>
                              <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                <option selected disabled hidden>Informe o tipo de News</option>
                                <option value="1">Noticia</option>
                                <option value="2">Atualização</option>
                                <option value="3">Evento</option>                              
                              </select>
                              @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                       <button type="submit" class="btn btn-success">Enviar</button>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
