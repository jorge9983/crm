@extends('layouts.app')

@section('content')
<div class="container">

  @error('nombre')
  <div class="alert alert-danger">
    El nombre es obligatorio
  </div>
  @enderror

  @error('correo')
  <div class="alert alert-danger">
    El correo es obligatorio
  </div>
  @enderror

  @error('sitioweb')
  <div class="alert alert-danger">
    El sitio web es obligatorio
  </div>
  @enderror

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Agregar Empresa</span>
          <a href="/empresas" class="btn btn-primary btn-sm">Volver a lista de empresas...</a>
        </div>
        <div class="card-body">
          @if ( session('mensaje') )
          <div class="alert alert-success">{{ session('mensaje') }}</div>
          @endif
          <form method="POST" action="/empresas">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2"  value="{{ old('nombre') }}"/>
            <input type="email" name="correo" placeholder="Correo electronico" class="form-control mb-2" value="{{ old('correo') }}" />
            <input type="url" name="sitioweb" placeholder="Sitio Web" class="form-control mb-2" value="{{ old('sitioweb') }}" />
            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection