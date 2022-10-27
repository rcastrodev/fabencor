@extends('paginas.partials.app')
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.915975366059!2d-58.34181758514612!3d-34.682070069154264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a3331cfb248a93%3A0x79cfdd45439ad383!2sSan%20Pedro%20274%2C%20B1872CZE%20Sarand%C3%AD%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses-419!2smx!4v1638148758794!5m2!1ses-419!2smx" height="464" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-18">
                    <h4 class="fw-bold font-size-18 mb-3" style="color: #1E51A0;">FABENCOR</h4>
                    <div class="d-flex mb-3">
                        <i class="fas fa-map-marker-alt d-block me-2" style="color: #1E51A0;"></i>
                        <address class="d-block m-0 font-size-13" style="color:#858592;">{{ $data->address }}</address>
                    </div>
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    <div class="d-flex mb-3">
                        <i class="fas fa-phone-alt d-block me-2 font-size-20" style="color: #1E51A0;"></i>
                        @if (count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class=" text-decoration-none underline font-size-13" style="color:#858592;">{{$phone[1]}}</a>
                        @else 
                            <a href="tel:{{ $data->phone1}}" class="text-decoration-none underline font-size-13" style="color:#858592;">{{ $data->phone1}}</a>
                        @endif  
                    </div>
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex mb-3">
                        <i class="fab fa-whatsapp d-block me-2 font-size-20" style="color: #1E51A0;"></i>
                        @if (count($phone2) == 2)
                            <a href="tel:{{$phone2[0]}}" class=" text-decoration-none underline font-size-13" style="color:#858592;">{{$phone2[1]}}</a>
                        @else 
                            <a href="tel:{{ $data->phone2}}" class="text-decoration-none underline font-size-13" style="color:#858592;">{{ $data->phone2}}</a>
                        @endif  
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-envelope d-block me-2" style="color: #1E51A0;"></i><span class="d-block font-size-13" style="color:#858592;">{{ $data->email }}</span>                        
                    </div>
                    <p class="font-size-13" style="color:#858592;">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                </div>          
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="telefono" placeholder="Teléfono" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn bg-primary font-size-14 py-2 font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5 rounded-pill">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
