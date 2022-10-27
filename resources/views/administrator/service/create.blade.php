@extends('adminlte::page')
@section('title', 'Crear servicio')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear servicio</h1>
        <a href="{{ route('service.content') }}" class="btn btn-sm btn-primary">ver servicios</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('service.store') }}" method="post" class="row pb-5" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del servicio">
        </div>  
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA BB CC">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-4">
            <textarea name="description" class="form-control ckeditor" cols="30" rows="15" placeholder="Descripción">{{old('description')}}</textarea>
        </div>  
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label for="">Imagen</label>
            <small>Tamaño recomendado 564x315px</small>
            <input type="file" name="img" class="form-control-file">
        </div> 
    </div>
    <div class="col-sm-12 text-right">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div> 
</form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

