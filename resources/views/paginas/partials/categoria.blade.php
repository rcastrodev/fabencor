<div class="card card-producto position-relative">
    <div class="position-relative">
        <a href="{{ route('categoria', ['id' => $category->id]) }}" class="position-absolute mas">
            <i class="fas fa-search-plus"></i>
        </a>
        @if ($category->image)
            <img src="{{ asset($category->image) }}" class="card-img-top img-fluid" alt="{{$category->name}}">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" alt="{{$category->name}}">	
        @endif
        @if ($category->brand_image)
            <img src="{{ asset($category->brand_image) }}" class="position-absolute img-fluid" style="    bottom: 0px;
            right: 10px; max-width: 70px; max-height: 60px; min-height: 50px; object-fit: contain;" alt="{{$category->name}}">
        @endif
    </div>
    <div class="card-body bg-white">
        <a href="{{ route('categoria', ['id' => $category->id]) }}" class="card-title text-center font-size-20 text-decoration-none text-dark d-block text-center">{{$category->name}}</a>
    </div>
</div>

