@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators d-sm-none d-md-block">
			@foreach ($sliders as $k => $slide)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner h-100">
			@foreach ($sliders as $k => $slide)
				<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					<div class="carousel-caption container">
						<div class="w-50 text-start">
							<h2 class="font-size-27 text-white" style="font-weight: 400;">{{ $slide->content_1 }}</h2>
						</div>
					</div>
				</div>			
			@endforeach
		</div>
	</div>
@endif
@isset($qualities)
	@if(count($qualities))
		<section id="qualities" class="py-5">
			<div class="container d-flex justify-content-center">
				<div class="d-flex flex-wrap justify-content-between">
					@foreach ($qualities as $q)
						@if (Storage::disk('public')->exists($q->image))
							<div class="text-center me-sm-0 me-md-3" style="max-width: 140px;">
								<img src="{{Storage::disk('public')->url($q->image)}}" class="d-block img-fluid mx-auto mb-3" width="76" height="76">
								<strong class="font-size-14">{{$q->content_1}}</strong>
							</div>		
						@endif
					@endforeach
				</div>
			</div>
		</section>
	@endif
@endisset
@isset($section2)
	<section id="section2" class="py-sm-2 py-md-5">
		<div class="container row mx-auto">
			<div class="col-sm-12 col-md-5 position-relative d-sm-none d-md-block">
				@if (Storage::disk('public')->exists($section2->image))
					<img src="{{Storage::disk('public')->url($section2->image)}}" class="img-fluid position-absolute" style="top: -130px; min-width:542px; min-height:430px;">
				@endif
			</div>	
			<div class="col-sm-12 col-md-6 mt-sm-0 mt-md-5" style="z-index: 100;">
				<div class="pe-sm-0 pe-md-5">
					<div class="font-size-21" style="color: #1E51A0; font-weight: 500;">{!! $section2->content_1 !!}</div>
					<div class="text-end"><a href="{{ route('cajas-medidas-estandart') }}" class="btn bg-secundary text-white rounded-pill font-size-13 px-4 py-2">VER PRODUCTO</a></div>
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($section3)
	<section id="section3" class="py-5" style="background-image: url({{ $section3->image }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
		<div class="container row mx-auto text-white text-center">
			<div class="col-sm-12 col-md-8 offset-md-2 offset-sm-0 mb-5">
				<h3 class="fw-bold font-size-27">{{ $section3->content_1 }}</h3>
			</div>	
			<div class="col-sm-12 col-md-8 offset-md-2 offset-sm-0">
				<div class="font-size-16">{!! $section3->content_2 !!}</div>
			</div>
		</div>
	</section>
@endisset
@isset($products)
	@if(count($products))
		<section id="products" class="py-sm-3 py-md-5">
			<div class="container row mx-auto">
				<div class="col-sm-12"><h3 class="text-secundary font-size-21 text-center mb-5">CAJAS MEDIDAS ESPECIALES</h3></div>
				@foreach ($products as $p)
					<div class="col-sm-12 col-md-3 mb-sm-2 mb-md-5">
						@include('paginas.partials.producto', ['product' => $p])
					</div>
				@endforeach
			</div>
		</section>
	@endif
@endisset
@endsection

