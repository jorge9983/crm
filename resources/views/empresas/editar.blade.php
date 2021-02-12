@extends('layouts.app')
@section('content')
<h1>Editar</h1>
@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif
<form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
    @method('PUT')
    @csrf

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

    @error('sitioweo')
    <div class="alert alert-danger">
        El sitio web es obligatorio
    </div>
    @enderror

    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $empresa->nombre }}">
    <input type="text" name="correo" placeholder="Correo" class="form-control mb-2" value="{{ $empresa->correo }}">
    <input type="text" name="sitioweb" placeholder="Sitio Web" class="form-control mb-2" value="{{ $empresa->sitioweb }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
</form>
@endsection