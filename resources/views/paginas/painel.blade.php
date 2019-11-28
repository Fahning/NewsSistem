@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-md-6"><h3>Noticias</h3></div>
                        @if (Auth::check())
                        <div class="col-md-6 text-right"><a href="{{ route('adiciona') }}" class="btn btn-success">Nova Noticia</a></div>    
                        @endif 
                    </div>              
                </div>

                <div class="card-body">                    
                    <table class="table">
                        <tbody>
                            @foreach ($noticias as $noticia)                            
                                <script>
                                    function chama(link)
                                    {   
                                        $(link).modal('show') ;                                                                                                
                                    }
                          
                                </script>
                                <tr id='tupla'>
                                    <td  onClick="chama('#modal{{$noticia->id}}');">
                                        @if ($noticia->type == 1)
                                            <div><span class="tipoNoticia">Noticia</span></div>
                                        @elseif($noticia->type == 2 )
                                            <div><span class="tipoUpdate">Atualização</span></div>
                                        @elseif ($noticia->type == 3 )
                                            <div><span class="tipoEvento">Evento</span></div>
                                        @endif
                                    </td>
                                    <th style="color:blueviolet" onClick="chama('#modal{{$noticia->id}}');">{{$noticia->title}}</th>
                                    <td>{{ \Carbon\Carbon::parse($noticia->created_at, 'pt_BR')->format('d/M')}}</td>                                                                
                                    @if (Auth::check())
                                        @if (Auth::user()->nivel == 1)
                                            <td style="padding-right: 1px; padding-lef: 1px with:20px" ><a id="btn-edit" href="{{ route('editar', $noticia->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                            <td style="padding-left: 1px; padding-right: 1px with:20px" >   <a href="{{route('excluir', $noticia->id)}}" class="btn btn-success"><i class="fa fa-trash"></i></a></td>
                                            
                                        @elseif (Auth::user()->nivel == 2)
                                            <td ><a href="{{ route('editar', $noticia->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                        @endif                             
                                    @endif
                                </tr>
                                <div class="modal fade bd-example-modal-lg" id="modal{{$noticia->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                            <div class="mx-auto"><h3>{{$noticia->title}}</h3></div>
                                            <button type="button" class="close m-0 p-1 text-white" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">{{$noticia->message}}</div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                                <div class="col-md-6">Autor: <strong>{{ $noticia->autor($noticia->user_id)->name }}</strong></div>
                                                <div class="col-md-6 text-right">Postado: {{ \Carbon\Carbon::parse($noticia->created_at, 'pt_BR')->format('d/M - H:i')}}</div>                                                                           
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach                     
                        </tbody>
                        
                    </table>    
                    
                           
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
