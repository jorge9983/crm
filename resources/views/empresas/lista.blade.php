@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Empresas</span>
                    <a href="/empresas/create" class="btn btn-primary btn-sm">Nueva Empresa</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Sitio Web</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    <a href="{{route ('empresas.detalle', $item)}}">
                                        {{$item->nombre}}
                                    </a>
                                </td>
                                <td>{{ $item->correo }}</td>
                                <td>{{ $item->sitioweb }}</td>
                                <td>
                                    <a href="{{route('empresas.edit', $item)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{route('empresas.destroy', $item)}}" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$empresas->links()}}
                    {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection