@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <h4 class="col-sm-12 mb-4">Contenido de empresa</h4>
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h1 class="mr-3">Galería</h1>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-galery-element">crear</button>
        </div>
        <table id="page_table_galery" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h1 class="mr-3">Cualidades</h1>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-qualities-element">crear</button>
        </div>
        <table id="page_table_qualities" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.galeries.create')
@includeIf('administrator.company.galeries.update')
@includeIf('administrator.company.qualities.create')
@includeIf('administrator.company.qualities.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
    <script>
        function imgDelete(e)
        {
            element = e.target
            if(element.classList.contains('form-control-file')) return undefined 

            e.preventDefault()
            if(element.classList.contains('image')){
                axios.delete(element.dataset.url)
                    .then(r => {
                        element.closest('div').remove()
                    })
                    .catch(e => console.error(new Error(e)))
            }
        }

        let sections = document.querySelectorAll('.image-delete')
        if (sections) {
            sections.forEach(element => {
            element.addEventListener('click', imgDelete)
            })     
        }
    </script>
@stop

