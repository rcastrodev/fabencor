@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('categorias') }}" class="text-decoration-none text-dark fw-bold">Productos</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{$element->name}}</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                @isset($categories)
                    @if (count($categories))
                        <ul class="p-0 font-size-18" style="list-style: none;">
                            @foreach ($categories as $category)
                                <li class="@if($category->name == $element->name) active @endif">
                                    <a href="#" class="toggle d-block p-2 text-decoration-none text-decoration-none text-white">{{ $category->name }}</a>
                                    <ul class="ps-0 {{ ($element->name == $category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                        @foreach ($category->products as $p)
                                            <li>
                                                <a href="{{ route('producto', ['id'=> $p->id ]) }}" class="text-dark text-decoration-none d-block py-1 ms-4"> {{ $p->name }} </a>
                                            </li>                            
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>            
                    @endif   
                @endisset
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-md-6">
                            @includeIf('paginas.partials.producto', ['product' => $product])
                        </div>
                    @endforeach
                </div>                                
            </section>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
