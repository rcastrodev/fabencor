@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="category_id" value="2">
    <input type="hidden" name="name" value="{{$product->name}}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        @if ($product->data_sheet)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12 col-md-4">
            <label>Ficha técnica</label>
            <input type="file" name="data_sheet" class="form-control-file">
        </div>  
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="description" class="form-control ckeditor" cols="30" rows="2">{{$product->description}}</textarea>
        </div>
        <div class="form-group col-sm-12 mt-3">
            <h4>Imágen de producto</h4> <small>la imagen debe ser al menos 605x443</small>   
        </div>   
        @if (count($product->images))
            @foreach ($product->images as $pi)
                <div class="form-group col-sm-12 col-md-4 ">
                    <div class="position-relative">
                        <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                        <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                    </div>
                    <label>imagen</label>
                    <input type="file" name="images[]" class="form-control-file">
                </div>                    
            @endforeach    
        @else
            <div class="form-group col-sm-12 col-md-4 ">
                <input type="file" name="images[]" class="form-control-file">
            </div> 
        @endif
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@includeIf('administrator.product.variable-product.index')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
    <script>        
        // borrar ficha técnica 
        let borrarFicha = document.getElementById('borrarFicha')
        if (borrarFicha) {
            borrarFicha.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })  
        }

        $('.destroyDescriptionImage').click(function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                },
                url: e.target.dataset.url,
                type:'delete',
                success: function (response) {
                    e.target.closest('.position-relative').remove()
                },
                error:function(x,xs,xt){
                    console.log(JSON.stringify(x))
                }
            });
        })
    </script>
@stop

