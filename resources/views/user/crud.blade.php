@extends('master')
@section('title', 'Usuarios')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/users/200') }}" class="nav-link">
        <i class="fas fa-users"></i> Usuarios</a>
</li>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fas fa-users"></i> Usuarios 
                </h2>
                
            </div>
            <div class="inside">
                
                  <div class="row justify-content-between">
                    <div class="col-4">
                     
                    </div>
                    <div class="col-4" style="margin-right: 25px">
                        <div class="dropdown">
                            <a class="btn btn-two dropdown-toggle rigth" style="font-size: 0.9em" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-filter"></i> Filtrar búsqueda 
                            </a>
                          
                            <div class="dropdown-menu" style="font-size: 0.8em" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{'/users/all'}}"><i class="fas fa-globe-africa"></i> Todos</a>
                              <a class="dropdown-item" href="{{'/users/0'}}"><i class="fas fa-stream"></i> Registrados</a>
                              <a class="dropdown-item" href="{{'/users/1'}}"><i class="fas fa-user-check"></i> Verificados</a>
                              <a class="dropdown-item" href="{{'/users/100'}}"><i class="fas fa-window-close"></i> Suspendidos</a>
                            </div>
                          </div>
                    </div>
                  </div>
                <table class="table table-striped" id="table_id">
                    <caption>Total de usuarios: </caption>
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Estado del usuario</td>
                            <td>Nombre</td>
                            <td>Correo ELectrónico</td>
                            <td>Teléfono</td>
                            <td>Configuración</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $user)
                            <tr>   
                                <td>{{ $user->id }}</td>
                                <td>
                                    {{ getStatusUserKey(null, $user->user_state)}}
                                </td>
                                <td>
                                    {{ $user->name.' '.$user->last_name}}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <div class="obs">
                                    
                                        <td>
                                            @if($user->id != Auth::id())
                                                <a data-toggle="tooltip" data-placement="top" title="Perfil el usuario" href="{{url('/users/profile/'.$user->id)}}" ><i class="fas fa-cog"></i></a>
                                            @endif
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
@section('scripts')
@stop