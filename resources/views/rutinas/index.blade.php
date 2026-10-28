@extends('layouts.master')
@section('titulo', 'Les meves rutines')
@section('content')
<div class="container mt-4">
    <div class="mb-3 text-end">
        <a href="{{ route('rutinas.create') }}" class="btn btn-success">
            + Crear rutina
        </a>
    </div>
    <div class="d-flex justify-content-center mb-3">
        {{ $rutinas->links() }}
    </div>
    <table class="table table-primary table-striped border-light shadow border-0">
        <thead class="text-center border border-black">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Resum</th>
                <th>Duració (min)</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rutinas as $rutina)
            <tr>
                <td class="text-center">{{ $rutina->id }}</td>
                <td class="text-center">{{ $rutina->nom }}</td>
                <td class="text-center">{{ $rutina->resum }}</td>
                <td class="text-center">{{ $rutina->duracio }}</td>
                <td class="text-center">
                    <a href="{{ route('rutinas.show', $rutina->id) }}" class="btn btn-primary">
                        Visualizar
                    </a>
                </td>
                <td class="text-center">
                    <a href="{{ route('rutinas.edit', $rutina->id) }}" class="btn btn-warning">
                        Modificar
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $rutinas->links() }}
    </div>
</div>
@endsection