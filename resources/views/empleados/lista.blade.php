@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Empleados</span>
                    <a href="/empleados/create" class="btn btn-primary btn-sm">Nuevo Empleado</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    <a href="{{route ('empleados.show', $item)}}">
                                        {{$item->nombre}}
                                    </a>
                                </td>
                                <td>{{ $item->apellido }}</td>
                                <td>{{ $item->correo }}</td>
                                <td>{{ $item->telefono }}</td>
                                <td>
                                    <a href="{{route('empleados.edit', $item)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{route('empleados.destroy', $item)}}" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$empleados->links()}}
                    {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection