@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if(count($sliders))
		<div id="sliderEmpresa" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
						<div class="carousel-caption w-75">
							<h2 class="font-size-50 fw-bold">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif	
@endisset
@isset($section2)
	@if($section2)
		<section id="section_2" class="py-sm-2 pt-md-5">
			<div class="container py-sm-0 py-md-3">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h3 class="text-secundary mb-4 fw-bold font-size-18">{{ $section2->content_1 }}</h3>
						<div class="font-size-14 mb-5">{!! $section2->content_2 !!}</div>
						<div class="">
							@foreach ($section4s as $s4)
							<div class="d-flex mb-2">
								<img src="{{ Storage::disk('public')->url($s4->image) }}" class="d-block me-2">
								<div class="">
									<h5 class="my-2 font-size-14 fw-bold">{{ $s4->content_1 }}</h5>
									<div class="font-size-14">{!! $s4->content_2 !!}</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
						@isset($section3s)
							@if (count($section3s))
								<div class="mb-3">
									<img src="{{ Storage::disk('public')->url($section3s[0]->image) }}" id="imagen-actual" class="img-fluid w-100" style="object-fit: cover">
								</div>
								<div class="carrusel">
									@foreach ($section3s as $s3)
										<img src="{{ Storage::disk('public')->url($s3->image) }}" class="img-fluid imagenes" style="cursor: pointer;">
									@endforeach
								</div>
							@endif		
						@endisset
					</div>
				</div>
			</div>
		</section>
	@endif	
@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
@endpush
@push('scripts')
	<script src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
		$('.carrusel').slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 3
		});

        $('.imagenes').click(function (e){
            e.preventDefault()
            $('#imagen-actual').attr('src', e.target.src)
        })
	</script>
@endpush

       
