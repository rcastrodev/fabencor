<section>
    <div class="bg-footer">
        <div class="container"><h3 class="text-uppercase p-3 text-primary bg-white d-inline-block mb-0 font-size-25 fw-normal">{{ $distributor->content_1 }}</h3></div>
    </div>
    <div class="bg-white py-4">
        <div class="container">
            <div class="row">
                @if (Storage::disk('public')->exists($distributor->image))
                    <div class="col-sm-12 col-md-4">
                        <img src="{{ asset($distributor->image) }}" class="img-fluid">
                    </div>
                @endif
                <div class="col-sm-12 col-md-8 text-center text-primary d-flex align-items-center justify-content-center">
                    <p class="font-size-25">{{ $distributor->content_2 }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
