
@extends('login.master-login')
@yield('Inicio de sesión')

@section('body')
    

<div class="main">
    
    
    <div class="container">
      <div class="middle">
        <div id="login">

       <h5 class="title-login mb-5">Panel administrativo</h5>
  
      <form action="/login" method="post">
        @csrf
        <fieldset class="clearfix">
            @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('typealert')}}" style="margin-top: -16px;">
                    {{ Session::get('message')}}
                </div>
            @endif
  
          <p ><span class="fa fa-user"></span><input type="text" name="email"  Placeholder="Correo Electrónico" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            @if ($errors->has('email'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('email') }}</p>         
                </div>
            @endif
          <p><span class="fa fa-lock"></span><input type="password" name="pass"  Placeholder="Contraseña" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            @if ($errors->has('pass'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('pass') }}</p>         
                </div>
            @endif

          <div>
            <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Iniciar Sesión"></span>
        </div>
        </fieldset>
        <div class="clearfix"></div>
      </form>
  
          <div class="clearfix"></div>
  
        </div> <!-- end login -->
        
        <div class="logo">
          <img src="{{urlCDN().'assets/logo_ingelmec_white.png'}}" class="img-fluid" alt="LOGO INGELMEC">
            <div class="clearfix"></div>
        </div>
        
        </div>
    </div>
  
  </div>
    


@endsection