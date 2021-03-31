@extends('master')
@section('title', 'Blog')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/users/200') }}" class="nav-link">
        <i class="fas fa-users"></i> Blog</a>
</li>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fas fa-users"></i> Publicaciones 
                </h2>
                
            </div>
            <div class="inside">
                <a class="btn btn-two  float-left" style="font-size: 0.9em" href="{{url('/blog/add/a')}}">
                    <i class="fas fa-plus"></i> Crear publicación
                </a>
                  <div class="row justify-content-between">
                    <div class="col-4">
                     
                    </div>
                    <div class="col-4" style="margin-right: 25px">
                        
                        <div class="dropdown">
                            
                            <a class="btn btn-two dropdown-toggle rigth" style="font-size: 0.9em" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-filter"></i> Filtrar búsqueda 
                            </a>
                          
                            <div class="dropdown-menu" style="font-size: 0.8em" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{'/blog/all'}}"><i class="fas fa-globe-africa"></i> Todos</a>
                                <a class="dropdown-item" href="{{'/blog/1'}}"><i class="fas fa-user-check"></i> Activos</a>
                                <a class="dropdown-item" href="{{'/blog/100'}}"><i class="fas fa-window-close"></i> Eliminados</a>
                            </div>
                        </div>
                    </div>
                  </div>
                <table class="table table-striped" id="table_id">
                    <caption>Total de publicaciones: </caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Configuración</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr>   
                                <td>
                                    {{ $blog->id }}
                                </td>
                                <td>
                                    {{ $blog->title }}
                                </td>
                                <td>
                                    {!! $blog->description !!}
                                </td>
                                <div class="obs">
                                    <td>
                                       
                                        <a data-toggle="tooltip" data-placement="top" title="Editar publicación" href="{{url('/blog/edit/'.$blog->id)}}" ><i class="fas fa-cog"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar publicación" href="{{url('/blog/delete/'.$blog->id)}}" ><i class="fas fa-trash"></i></a>
                                       
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
