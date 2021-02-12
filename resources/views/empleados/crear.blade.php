@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Agregar Nota</span>
          <a href="/empresas" class="btn btn-primary btn-sm">Volver a lista de empleados...</a>
        </div>
        <div class="card-body">
          @if ( session('mensaje') )
          <div class="alert alert-success">{{ session('mensaje') }}</div>
          @endif
          <form method="POST" action="/empleados">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" />
            <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" />
            <input type="email" name="correo" placeholder="Correo electronico" class="form-control mb-2" />
            <input type="tel" size="8" name="telefono" placeholder="Telefono" class="form-control mb-2" />
            <select name="empresa_id" placeholder="Empresa" class="form-control mb-2">
              @foreach ($empresas as $e)
              <option value="{{ $e->id }}">{{ $e->nombre }}</option>
              @endforeach
            </select>
            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection