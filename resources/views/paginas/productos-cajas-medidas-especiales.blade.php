@extends('paginas.partials.app')
@section('content')
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active text-dark" aria-current="page">Cajas Medidas Especiales</li>
        </ol>
    </div>
</nav>  
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $p)
                <div class="col-sm-12 col-md-4 mb-5">
                    @includeIf('paginas.partials.producto', ['product' => $p])
                </div> 
            @endforeach
        </div>
    </div>
</div>  
@endsection
@push('scripts')
@endpush
