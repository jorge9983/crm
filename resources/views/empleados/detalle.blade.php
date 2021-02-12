@extends('layouts.app')

@section('content')
<div class="container my-2">
    <h1 class="display-6">Detalle del Empleado</h1>
    <h4>Nombre: {{$empleado->nombre}}</h4>
    <h4>Apellido: {{$empleado->apellido}}</h4>
    <h4>Correo: {{$empleado->correo}}</h4>
    <h4>Telefono: {{$empleado->telefono}}</h4>
    <h4>Emrpesa: {{$empresa->nombre}}</h4>
    <br>
</div>
@endsection