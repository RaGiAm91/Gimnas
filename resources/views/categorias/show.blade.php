@extends('layouts.master')

@section('titulo', 'Detalle Categoría')

@section('content')

<div class="container mt-4 bg-warning-subtle">
  <div class="row justify-content-center">
    <div class="card shadow border-0">
      <div class="card-body text-center">

        <h4>#{{ $categoria->id }} - {{ $categoria->nom }}</h4>

        <p><b>Descripció:</b> {{ $categoria->descripcio }}</p>

        <br>

        <a class="btn btn-primary" href="{{ route('categorias.index') }}">
            Volver
        </a>

        @auth
            @if (Auth::user()->email == 'admin@admin.cat')
                <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria->id) }}">
                    Modificar
                </a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        Eliminar
                    </button>
                </form>
            @endif
        @endauth

        <hr>

        <h5>Exercicis de la categoria</h5>

        @if($categoria->exercicis->count())
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Acció</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoria->exercicis as $exercici)
                        <tr>
                            <td>{{ $exercici->id }}</td>
                            <td>{{ $exercici->nom }}</td>
                            <td>
                                <a href="{{ route('exercicis.show', $exercici->id) }}" class="btn btn-sm btn-primary">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hi ha exercicis en aquesta categoria.</p>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection