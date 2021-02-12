@extends('layouts.app')

@section('content')
<h1 class="display-4">Detalle de la Empresa</h1>
<h4>Nombre: {{$empresa->nombre}}</h4>
<h4>Correo: {{$empresa->correo}}</h4>
<h4>Sitio Web: {{$empresa->sitioweb}}</h4>


<div class="container my-4">
    <h1 class="display-4">Empleados</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresa->empleados as $e)
            <tr>
                <th scope="row">{{$e->id}}</th>
                <td>
                    <a href="{{route ('empleados.detalle', $n)}}">
                        {{$e->nombre}}
                    </a>
                </td>
                <td>{{$e->correo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



    @endsection