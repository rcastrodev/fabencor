@extends('paginas.partials.app')
@section('content')
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb" style=>
            <li class="breadcrumb-item active text-dark" aria-current="page">Rollos corrugados simple faz</li>
        </ol>
    </div>
</nav>  
<header style="background-image: url({{ Storage::disk('public')->url($product->extra1) }}); height:50vh; background-repeat: no-repeat;
    background-size: 100% 100%;
}"></header>
<div class="container mx-auto row py-sm-2 py-md-5">
    <div class="col-sm-12 col-md-6">
        <img src="{{ Storage::disk('public')->url($product->images()->first()->image) }}" class="img-fluid">
    </div>
    <div class="col-sm-12 col-md-6 d-flex flex-column justify-content-between">
        <div class="fw-bold font-size-14">{!! $product->description !!}</div>
        <div class="">
            <h5 class="text-uppercase fw-bold font-size-20">Medidas</h5>   
            @if (count($product->variableProducts))
                <div class="row mb-5">
                    <div class="col-sm-12 table-responsive">
                        <table id="tableVP" class="table" style="max-width: 300px;">
                            <tbody class="font-size-19">
                                @foreach ($product->variableProducts->chunk(2) as $vProducts)
                                    <tr>
                                        @foreach ($vProducts as $vProduct)
                                            <td class="font-size-14">
                                                <span class="d-inline-block me-3 fw-bold">{{$vProduct->measures}}</span>
                                            </td> 
                                        @endforeach
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                  
            @endif  
        </div>
        <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
            @if($product->data_sheet)
                <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 mb-sm-4 px-md-5 px-sm-5 btn font-size-13 w-sm-100 w-md-50 text-uppercase text-center text-primary rounded-pill d-flex align-items-center" style="border: 1px solid #1E51A0"> <i class="fas fa-download me-2"></i> <span>descargar ficha</span></a>       
            @endif
            <a href="{{ route('solicitud-de-presupuesto', ['opcion'=> 3]) }}" class="btn text-white bg-secundary py-2 px-5 text-uppercase font-size-13 w-sm-100 w-md-50 rounded-pill">Consultar</a>
        </div>
        
    </div>
</div>
@endsection
@push('scripts')
@endpush
