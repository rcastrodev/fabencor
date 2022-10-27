@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active text-dark" aria-current="page">Solicitud de presupuesto</li>
        </ol>
    </div>
</nav> 
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
    <div class="w-75 mx-auto">
        <div class="d-flex justify-content-around my-5 tabs-presupuesto">
            <div class="d-flex flex-column justify-content-between align-items-center">
                <img src="{{ asset('images/cajas_Mesa_de_trabajo_1.svg') }}" alt="">
                <strong>CAJAS ESTANDART</strong>
                <input type="radio" name="quote" id="caja1">
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <img src="{{ asset('images/cajas-02.svg') }}" alt="">
                <strong>CAJAS ESPECIALES</strong>
                <input type="radio" name="quote" id="caja2">
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <img src="{{ asset('images/cajas-03.svg') }}" alt="">
                <strong>CORRUGADO</strong>
                <input type="radio" name="quote" id="caja3">
            </div>
        </div>
        <div id="section1">
            <form action="{{ route('cajas-medidas-estandart.mail') }}" method="post" enctype="multipart/form-data" class="row mb-5">
                @csrf
                @if (session('vps'))
                    <div class="col-sm-12 table-responsive">
                        <table id="table"  class="table font-size-14 mb-4">
                            <thead class="text-capitalize bg-primary text-white">
                                <tr>
                                    <th scope="col" class="fw-light">Medidas</th>
                                    <th scope="col" class="fw-light text-center" width="120">Cantidad</th>
                                    <th scope="col" class="fw-light"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('vps') as $vp)
                                    <tr>
                                        <td>
                                            Caja medida estandart <strong>{{ $vp['measures'] }}</strong>
                                            <input type="hidden" name="variableproduct[{{$vp['id']}}][measures]" value="{{ $vp['measures'] }}">
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" name="variableproduct[{{$vp['id']}}][value]" min="1" value="" class="form-control">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary rounded-circle font-size-11 removeItem fas fa-times"
                                            data-url="{{ route('vp.destroy', ['id' => $vp['id']]) }}"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control valid" placeholder="Ingresar el nombre *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control valid" placeholder="Ingrese su correo electrónico *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control valid" placeholder="Ingrese su teléfono *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-5 position-relative">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-folder"></i></div>
                        </div>
                    </div>
                    <input type="file" name="file" class="form-control-file position-absolute" 
                    style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                </div>
                <div class="col-sm-12 text-end">
                    <button class="btn btn-sm btn-primary rounded-pill py-2 px-4 text-uppercase">Enviar</button>
                </div>
            </form>
        </div>
        <div id="section2" class="d-none">
            <form action="{{ route('cajas-especiales.mail') }}" method="post" enctype="multipart/form-data" class="row mb-5 bg-white">
                @csrf
                <div class="col-sm-12 col-md-6">
                    <div class="mb-4">Medidas:</div>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td><label for="" class="me-2 mb-4">* Largo</label></td>
                                <td><input type="number" name="largo" value="{{ old('largo') }}" class="form-control me-2 mb-4" style="width: 200px" required></td>
                                <td><span class="mb-4 d-block">mm</span></td>
                            </tr>
                            <tr>
                                <td><label class="me-2 mb-4">* Ancho</label></td>
                                <td><input type="number" name="ancho" value="{{ old('ancho') }}" class="form-control me-2 mb-4" style="width: 200px" required></td>
                                <td><span class="mb-4 d-block">mm</span></td>
                            </tr>
                            <tr>
                                <td><label for="" class="me-2 mb-4">* Alto</label></td>
                                <td><input type="number" name="alto" value="{{ old('alto') }}" class="form-control me-2 mb-4" style="width: 200px" required></td>
                                <td><span class="mb-4 d-block">mm</span></td>            
                            </tr>
                            <tr>
                                <td><label for="" class="me-2 mb-4">* Peso</label></td>
                                <td><input type="number" name="peso_aproximado_contenido" value="{{ old('peso_aproximado_contenido') }}" class="form-control me-2 mb-4" style="width: 200px" required></td>
                                <td><span class="mb-4 d-block">kg</span></td>            
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3 mt-sm-2 mt-md-5">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td><label for="" class="me-2 mb-4">Cantidad</label></td>
                                <td><input type="number" name="cantidad" value="{{ old('cantidad') }}" class="form-control me-2 mb-4" style="width: 200px"></td>
                                <td><span class="mb-4 d-block">Unidades</span></td>
                            </tr>
                            <tr>
                                <td><label class="me-2 mb-4">Libraje</label></td>
                                <td><input type="number" name="libraje" value="{{ old('libraje') }}" class="form-control me-2 mb-4" style="width: 200px"></td>
                                <td><span class="mb-4 d-block">Libras</span></td>
                            </tr>
                            <tr>
                                <td><label for="" class="me-2 mb-4">Impresión</label></td>
                                <td>
                                    <div class="form-group mb-4">
                                        <select name="impresion" class="form-control">
                                            <option selected disabled>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div> 
                                </td>
                                <td></td>            
                            </tr>
                            <tr>
                                <td><label for="" class="me-2 mb-4">Material doble - triple</label></td>
                                <td>
                                    <div class="form-group mb-4">
                                        <select name="material_doble_triple" class="form-control">
                                            <option selected disabled>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div> 
                                </td>
                                <td></td>            
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="contenido" placeholder="Contenido *" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control valid" placeholder="Ingresar el nombre *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control valid" placeholder="Ingrese su correo electrónico *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control valid" placeholder="Ingrese su teléfono *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-5 position-relative">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-folder"></i></div>
                        </div>
                    </div>
                    <input type="file" name="file" class="form-control-file position-absolute" 
                    style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                </div>
                <div class="col-sm-12 text-end">
                    <button class="btn btn-sm btn-primary rounded-pill py-2 px-4 text-uppercase">Enviar</button>
                </div>
            </form>
        </div>
        <div id="section3" class="d-none">
            <form action="{{ route('corrugado.mail') }}" method="post" enctype="multipart/form-data" class="row mb-5 bg-white">
                @csrf
                <div class="col-sm-12 col-md-6">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td>
                                    <label for="" class="me-2 mb-4">Medidas</label>
                                </td>
                                <td>
                                    <div class="form-group me-2">
                                        <select name="medidas" class="form-control mb-4" style="min-width: 200px;">
                                            <option value="0,7">0,7</option>
                                            <option value="0,8">0,8</option>
                                            <option value="0,9">0,9</option>
                                            <option value="1,00">1,00</option>
                                            <option value="1,20">1,20</option>
                                            <option value="1,40">1,40</option>
                                        </select>
                                    </div>
                                </td>
                                <td><span class="mb-4 d-block">mm</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <td>
                                    <label for="" class="me-2 mb-4">Cantidad</label>
                                </td>
                                <td>
                                    <div class="form-group me-2">
                                        <select name="cantidad" class="form-control mb-4" style="min-width: 200px;">
                                            @for ($i = 1; $i <= 50; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                                <td><span class="mb-4 d-block">Rollos</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <input type="radio" name="metros" value="30m"> <label for="">30m</label>
                    </div>
                    <div class="mb-3">
                        <input type="radio" name="metros" value="25m"> <label for="">25m</label>
                    </div>
                    <div class="mb-3">
                        <input type="radio" name="metros" value="20m"> <label for="">20m</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control valid" placeholder="Ingresar el nombre *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control valid" placeholder="Ingrese su correo electrónico *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control valid" placeholder="Ingrese su teléfono *" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-5 position-relative">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-folder"></i></div>
                        </div>
                    </div>
                    <input type="file" name="file" class="form-control-file position-absolute" 
                    style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                </div>
                <div class="col-sm-12 text-end">
                    <button class="btn btn-sm btn-primary rounded-pill py-2 px-4 text-uppercase">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('head')
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
    @if (Request::get('opcion') && Request::get('opcion') == 3)
        <script>
            $( "#caja3" ).trigger( "click" );
            $('#section1').removeClass('d-block')
            $('#section1').addClass('d-none')
            $('#section2').removeClass('d-block')
            $('#section2').addClass('d-none')
            $('#section3').removeClass('d-none')
            $('#section3').addClass('d-block')
        </script>
    @endif
    @if (Request::get('opcion') && Request::get('opcion') == 1)
        <script>
            $( "#caja1" ).trigger( "click" );
            $('#section2').removeClass('d-block')
            $('#section2').addClass('d-none')
            $('#section3').removeClass('d-block')
            $('#section3').addClass('d-none')
            $('#section1').removeClass('d-none')
            $('#section1').addClass('d-block')
        </script>
    @endif
    <script>
        $('#caja1').click(function(e){
            $('#section2').removeClass('d-block')
            $('#section2').addClass('d-none')
            $('#section3').removeClass('d-block')
            $('#section3').addClass('d-none')
            $('#section1').removeClass('d-none')
            $('#section1').addClass('d-block')
        })

        $('#caja2').click(function(e){
            $('#section1').removeClass('d-block')
            $('#section1').addClass('d-none')
            $('#section3').removeClass('d-block')
            $('#section3').addClass('d-none')
            $('#section2').removeClass('d-none')
            $('#section2').addClass('d-block')
        })
        $('#caja3').click(function(e){
            $('#section1').removeClass('d-block')
            $('#section1').addClass('d-none')
            $('#section2').removeClass('d-block')
            $('#section2').addClass('d-none')
            $('#section3').removeClass('d-none')
            $('#section3').addClass('d-block')
        })
    </script>
@endpush