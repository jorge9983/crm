@extends('layouts.app')

@section('content')
<h1 class="display-6">Detalle de la Empresa</h1>
<h4>Nombre: {{$empresa->nombre}}</h4>
<h4>Correo: {{$empresa->correo}}</h4>
<h4>Sitio Web: {{$empresa->sitioweb}}</h4>


<div class="container my-2">
    <h1 class="display-6">Empleados</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresa->empleados as $e)
            <tr>
                <td>{{$e->nombre}}</td>
                <td>{{$e->apellido}}</td>
                <td>{{$e->correo}}</td>
                <td>{{$e->telefono}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection