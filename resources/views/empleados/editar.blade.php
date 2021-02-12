@extends('layouts.app')
@section('content')
<h1>Editar</h1>
@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif
<form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
    @method('PUT')
    @csrf

    @error('nombre')
    <div class="alert alert-danger">
        El nombre es obligatorio
    </div>
    @enderror

    @error('apellido')
    <div class="alert alert-danger">
        El apellido es obligatorio
    </div>
    @enderror

    @error('correo')
    <div class="alert alert-danger">
        El correo es obligatorio
    </div>
    @enderror

    @error('telefono')
    <div class="alert alert-danger">
        El telefono es obligatorio
    </div>
    @enderror

    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $empleado->nombre }}">
    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{ $empleado->apellido }}">
    <input type="email" name="correo" placeholder="Correo" class="form-control mb-2" value="{{ $empleado->correo }}">
    <input type="tel" size="8" name="telefono" placeholder="Telefono" class="form-control mb-2" value="{{ $empleado->telefono }}">
    <select name="empresa_id" placeholder="Empresa" class="form-control mb-2">
        @foreach ($empresas as $e)
        <option value="{{ $e->id }}">{{ $e->nombre }}</option>
        @endforeach
    </select>
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
</form>
@endsection