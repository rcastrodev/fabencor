@extends('adminlte::page')
@section('title', 'Servicios')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Servicios</h1>
        <a href="{{ route('service.create') }}" class="btn btn-sm btn-primary">crear servicio</a>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>imagen</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/service/index.js') }}"></script>
@stop

