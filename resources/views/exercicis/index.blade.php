@extends('layouts.master')
@section('titulo', 'Exercicis')
@section('content')
<div class="container mt-4">
    
    @if(Auth::user()->email == 'admin@admin.cat')
        <div class="mb-3 text-end">
            <a href="{{ url('/exercicis/create') }}" class="btn btn-success">
                + Crear ejercicio 
            </a>
        </div>
    @endif

    <div class="d-flex justify-content-center mb-3">
        {{ $exercicis->links() }}
    </div>

    <table class="table table-primary table-striped border-light shadow border-0">
        <thead class="text-center border border-black">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Descripcio</th>
                <th>Imatge</th>
                <th>Acciones</th>
                @if(Auth::user()->email == 'admin@admin.cat')
                    <th>Editar</th>
                    <th>Eliminar</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($exercicis as $exercici)
            <tr>
                <td>{{ $exercici->id }}</td>
                <td>{{ $exercici->nom }}</td>
                <td>{{ $exercici->descripcio }}</td>
                <td>
                    @if($exercici->imatge)
                        <img src="{{ asset('storage/' . $exercici->imatge) }}" 
                             alt="{{ $exercici->nom }}" style="max-height: 60px;">
                    @endif
                </td>
                <td>
                    <a href="{{ url('/exercicis/' . $exercici->id) }}" class="btn btn-primary">
                        Visualizar
                    </a>
                </td>
                @if(Auth::user()->email == 'admin@admin.cat')
                    <td>
                        <a href="{{ url('/exercicis/' . $exercici->id . '/edit') }}" class="btn btn-warning">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <form action="{{ url('/exercicis/' . $exercici->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $exercicis->links() }}
    </div>
</div>
@endsection