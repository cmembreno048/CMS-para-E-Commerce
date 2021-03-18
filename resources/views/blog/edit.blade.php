@extends('master')
@section('title', 'Editar publicaciones')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/blog/all') }}" class="nav-link">
        <i class="fas fa-list"></i> Blog</a>
</li>
<li class="breadcrumb-item">
    <a href="#" class="nav-link">
        <i class="fas fa-edit"></i> Editar publicación
    </li></a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9" style="padding-right: 0;">
        <div class="container-fluid">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i> editar publicación</h2>
                </div>
                <div class="inside container">
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('typealert')}}" style="margin-top: -16px;">
                            {{ Session::get('message')}}
                        </div>
                    @endif 
                        {!! Form::open(['url' => '/blog/edit/'.$pbl->id,  'enctype' => "multipart/form-data", 'class' => '']) !!}  
                        
                            <div class="row mtop16">
                                <div class="col-md-6">
                                    <label for="title">Nombre de la publicación</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-signature"></i>
                                        </span>
                                        </div>
                                        {!! Form::text('title' ,$pbl->title, ['class' =>'form-control',  'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1"]) !!}
                                    </div>
                                    @if ($errors->has('title'))
                                    <div class="alert alert-danger mtop16">    
                                        <p>{{ $errors->first('title') }}</p>         
                                    </div>
                                @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="img_publication">Imagen de la publicación</label>
                                    <div class="custom-file">
                                        {!! Form::file('img_publication', ['class' =>'custom-file-input', 'id'=>"blog_image"]) !!}
                                        <label class="custom-file-label" for="customFile"><i class="fas fa-images"></i></label>
                                    </div>
                                    @if ($errors->has('img_publication'))
                                        <div class="alert alert-danger mtop16">    
                                            <p>{{ $errors->first('img_publication') }}</p>         
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="row mtop16">
                                <div class="col-md-6">
                                    <label for="video">Link de youtube</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fab fa-youtube"></i>
                                        </span>
                                        </div>
                                        {!! Form::text('video' ,$pbl->video, ['class' =>'form-control',  'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1"]) !!}
                                    </div>
                                    @if ($errors->has('video'))
                                    <div class="alert alert-danger mtop16">    
                                        <p>{{ $errors->first('video') }}</p>         
                                    </div>
                                @endif
                                </div>    
                            </div>
                            <div class="row mtop16">
                                <div class="col-md-12">
                                    <label for="description">Descripción</label>
                                    {!! Form::textarea('description' ,$pbl->description, ['class' =>'form-control', 'id'=>'editor', 'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1"]) !!}
                                </div>
                                @if ($errors->has('description'))
                                    <div class="alert alert-danger mtop16">    
                                        <p>{{ $errors->first('description') }}</p>         
                                    </div>
                                @endif
                            </div>
                             
                        <div class="publicationbtn">
                            {!! Form::submit('ACTUALIZAR' , [ 'class' => 'btn btn-success mtop16' ]) !!}     
                        </div>
                        
                        {!! Form::close() !!} 
                    
                </div>
               
                    
                
            </div>
        </div>
    </div>
    <div class="col-md-3" style="padding-left: 0;">
        <div class="container-fluid">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i>Imagen de publicación</h2>
                </div>
                <div class="inside container">
                    <img src="{{ urlCDN().$pbl->path.$pbl->image }}" class="mycenter" alt="imagen de publicación"  id="img_pbl" width="200">
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection