@extends('master')
@section('title', 'Perfil usuarios')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/users/all') }}" class="nav-link">
        <i class="fas fa-users"></i> Usuarios</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ url('/publication/edit') }}" class="nav-link">
        <i class="fas fa-users-cog"></i> Editar Usuarios</a>
</li>
@endsection
@section('content')

    <div class="container-fluid">
        @if($user->id != Auth::id())
        <div class="row">
            
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="far fa-user"></i> Perfil del usuario  </a>
                        </h2>
                    </div>
                    <div class="inside">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="center">
                                    @if(is_null(Auth::user()->avatar))
                                        <img class="img-fluid" src="{{urlCDN().'assets/userb.png'}}">
                                    @else
                                        <img src="{{ urlCDN().Auth::user()->path_avatar.Auth::user()->avatar }} " alt="foto de perfil usuario" class="img-fluid">
                                    @endif
                                </div>
                                <div class="text-user mtop16">
                                    <span for=""><i class="fas fa-user"></i> Nombre</span>
                                    <h6>{{ $user->name." ".$user->last_name }}</h6>
                                    <hr>
                                    <span for=""><i class="far fa-envelope"></i> Correo electrónico</span>
                                    <h6>{{ $user->email}}</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span for=""><i class="fas fa-user-shield"></i> Estatus del usuario</span>
                                            <h6>{{ getStatusUserKey(null, $user->user_state)}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <span for=""><i class="fas fa-user-tie"></i> Rol de usuario</span>
                                            <h6>{{getRoleUserKey(null,  $user->role)}}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span for=""><i class="fas fa-calendar-alt"></i> Fecha de registro</span>
                                            <h6>{{ $user->created_at}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <span for=""><i class="fas fa-user-tie"></i> Teléfono</span>
                                            <h6>{{ $user->phone}}</h6>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8"  style="padding-left: 0">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-users-cog"></i> Historial de compras de {{ $user->name." ".$user->last_name }}  </a>
                        </h2>
                    </div>
                    <div class="inside">
                        <table class="table table-striped" id="table_id">
                            <caption>Total Gastado:  </caption>
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Articulo</td>
                                    <td>Cantidad</td>
                                    <td>Precio Unitario</td>
                                    <td>Total sin IVA</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td>

                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-4 d-flex" >
                <div class="panel shadow" >
                    <div class="header" style="padding: 5px">
                        <i class="fas fa-tachometer-alt"></i> Modulo de dashboard
                    </div>
                    <div class="inside">
                        
                        <div class="">
                            <h3>
                                No tiene permisos para realizar esta acción
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    </div>

@stop