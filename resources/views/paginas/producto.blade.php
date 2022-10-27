@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('cajas-medidas-especiales') }}" class="text-decoration-none text-dark fw-bold">Cajas medidas especiales</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                @isset($products)
                    @if (count($products))
                        <ul class="p-0 font-size-18" style="list-style: none;">
                            @foreach ($products as $p)
                                <li style="{{ ($p->id == $product->id) ? 'background-color: #E9E9E9;' : '' }}">
                                    <a href="{{ route('producto', ['id'=> $p->id ]) }}" class="text-dark text-decoration-none d-block py-2 ms-4 font-size-14 " style="font-weight: 500"> {{ $p->name }} </a>
                                </li>   
                            @endforeach
                        </ul>            
                        
                    @endif   
                @endisset
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-5">
                        <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2 mb-3" data-bs-ride="carousel" style="">
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    @foreach ($product->images as $pk => $pv)
                                        <div class="carousel-item @if(!$pk) active @endif" style="background-color: #ececec;">
                                            <img src="{{ asset($pv->image) }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                            min-width: 100%; max-width: 100%; height: 350px;">
                                        </div>    
                                    @endforeach
                                @else
                                    <div class="carousel-item active" style="background-color: #ececec;">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: cover; min-width: 100%; max-width: 100%;" alt="">
                                    </div>   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div> 
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex flex-column justify-content-between">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <div class="">
                                <h1 class="mb-3 font-size-28 text-primary" style="font-weight: 500">{{ $product->name }}</h1>
                                <div class="font-size-14 mb-md-3 mb-sm-2 fw-bold">{!! $product->description  !!}</div>
                            </div>
                            <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                                @if($product->data_sheet)
                                    <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 mb-sm-4 px-md-5 px-sm-5 btn font-size-13 w-sm-100 w-md-50 text-uppercase text-center text-primary rounded-pill d-flex align-items-center" style="border: 1px solid #1E51A0"> <i class="fas fa-download me-2"></i> <span>descargar ficha</span></a>       
                                @endif
                                <a href="{{ route('solicitud-de-presupuesto') }}" class="btn text-white bg-secundary py-2 px-5 text-uppercase font-size-13 w-sm-100 w-md-50 rounded-pill">Consultar</a>
                            </div>
                        </div>
                    </div>
                </div>                                      
            </section>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
