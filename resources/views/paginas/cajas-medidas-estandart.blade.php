@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active text-dark" aria-current="page">Cajas medidas estandart</li>
            </ol>
        </nav>  
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 mb-4">
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
                </div> 
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="font-size-14 mb-md-5 mb-sm-2 mt-2 " style="font-weight: 600;">{!! $product->description  !!}</div>
                <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                    @if($product->data_sheet)
                        <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 mb-sm-4 px-md-5 px-sm-5 btn font-size-13 w-sm-100 w-md-50 text-uppercase text-center text-primary rounded-pill d-flex align-items-center" style="border: 1px solid #1E51A0"> <i class="fas fa-download me-2"></i> <span>descargar ficha</span></a>       
                    @endif
                </div>
            </div>
        </div>
        <section class="col-sm-12 font-size-14 mt-sm-4 mt-md-2"> 
            <h5 class="text-uppercase fw-bold font-size-20">Medidas</h5>   
            @if (count($product->variableProducts))
                <div class="row mb-5">
                    <div class="col-sm-12 table-responsive">
                        <table id="tableVP" class="table">
                            <tbody class="font-size-19">
                                @foreach ($product->variableProducts->chunk(5) as $vProducts)
                                    <tr>
                                        @foreach ($vProducts as $vProduct)
                                            <td class="font-size-14">
                                                <span class="d-inline-block me-3 fw-bold">{{$vProduct->measures}}</span>
                                            </td> 
                                            <td>
                                                <button class="btn btn-sm addVP btn-primary rounded-pill px-3" data-url="{{ route('vp.store') }}" data-id="{{$vProduct->id}}" data-measures="{{$vProduct->measures}}" style="font-size: 11px; width: 90px;">Agregar</button>
                                            </td>
                                        @endforeach
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                  
            @endif                                
        </section>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
