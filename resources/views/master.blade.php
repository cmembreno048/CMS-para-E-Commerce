

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrt-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <title>@yield('title')</title>
    {{-- links del materializa --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    {{-- font de google --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- link my css main--}}
    <link rel="stylesheet" href=" {{ url('/static/css/site.css?v=' . time()) }} ">
    {{-- links css alerts --}}
    <link rel="stylesheet" href=" {{ url('/static/css/alerts.css?v=' . time()) }} ">
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">

    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 


    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>    
    
</head>
<body>

    <div class="wrapper">
        <div class="col1">
            <div class="sidebar shadow">
                <div class="section-top">
                    <div class="logo">
                        @if(is_null(Auth::user()->avatar))
                            <img class="img-fluid" src="{{urlCDN().'assets/userb.png'}}">
                        @else
                            <img src="{{ urlCDN().Auth::user()->path_avatar.Auth::user()->avatar }} " alt="foto de perfil usuario" class="img-fluid">
                        @endif
                    </div>
                    <div class="user">
                        <span class="subtitle">
                            Bienvenido
                        </span>
                        <div class="name">
                            {{ Auth::user()->name.' '.Auth::user()->last_name }}
                        </div>
                        <div class="email">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
                <div class="main">
                    <ul>
                        {{-- Para marcar el boton que este seleccionado se pone la clase lk-CurrentRouteName --}}
                        <li><a href="{{ url('/') }}" class="lk-dashboard"><i class="fas fa-tachometer-alt "></i> Dashboard</a></li>
                        <div class="divider"></div>

                        <li><a href="/users/all" class="lk-users"><i class="fas fa-user"></i> Usuarios</a></li>
                        <div class="divider"></div>
                        
                        <li class="lk-Institutions ">
                            <a class="lk-Institutions " href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-pencil-alt"></i> 
                                Menu   
                                <i class="fas fa-sort-down"></i>
                            </a>
                        </li>
                            <ul class="collapse list-unstyled" id="pageSubmenu" style="padding-left: 10px">
                                <li>
                                    <a class="lk-Institutions lk-edit_institution" href="#"><i class="fas fa-briefcase"></i> Ejemplo1</a>
                                </li>
                                <li>
                                    <a class="lk-EMS lk-edit_ems" href="#"><i class="far fa-lightbulb"></i> Ejemplo2</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-rocket"></i> Ejemplo3</a>
                                </li>
                            </ul>

                        <div class="divider"></div>

                        <li><a href="#" class="lk-category lk-category_edit lk-sub_category lk-sub_category_edit"><i class="fas fa-list"></i> Menu2</a></li>
                        <div class="divider"></div>
                    
                    
                        <li><a href="{{ url('/logout') }}" class="lk-users lk-users_edit "><i class="fas fa-sign-out-alt"></i> Salir</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col2">
            <nav class="navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <img src="{{urlCDN().'assets/logo_ingelmec.png'}}" class="img-fluid" style="height: 35px" alt="LOGO INGELMEC">
                            </a>
                        </li>
                    </ul>
                </div>
                <div style="font-size: 1.5em">
                    <i class="fas fa-bell"></i>
                </div>
            </nav>
            <div class="page">

                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow" >
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="nav-link">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            </li>
                            
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>
                </div>
                @section('content')
                @show
            </div>
            
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- datatables --}}
    
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


    <script src="https://kit.fontawesome.com/dd1db23f65.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
       integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js?v=' . time()) }} " ></script>
    <script src="{{ url('/static/js/master.js?v=' . time()) }} " ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" ></script>
    <script>
        $('.alert').slideDown();
        setTimeout(function() {$(".alert").fadeOut();}, 4000); 
    </script>
    
</body>
</html>