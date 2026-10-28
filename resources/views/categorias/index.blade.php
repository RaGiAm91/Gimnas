@extends('layouts.master')

@section('titulo', 'Categorías')

@section('content')

<br>

@auth
    @if (Auth::user()->email == 'admin@admin.cat')
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('categorias.create') }}" class="btn btn-success">
                Crear categoría
            </a>
        </div>
    @endif
@endauth

<table class="table table-primary table-striped border-light shadow border-0"> 
  
  <thead class="text-center border border-black">
    <tr>
      <th>#</th>
      <th>Nom</th>
      <th>Descripció</th>
      @auth
        @if (Auth::user()->email == 'admin@admin.cat')
        <th colspan="3">Acciones</th>
      @else
        <th colspan="1">Acciones</th>
        @endif
      @endauth
    </tr>
  </thead>

  <tbody class="table-group-divider">
    @foreach($categorias as $categoria)
    <tr>
      <td class="text-center">{{ $categoria->id }}</td>
      <td class="text-center">{{ $categoria->nom }}</td>
      <td class="text-center">{{ $categoria->descripcio }}</td>

      <td class="text-center">
        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-primary">
            Ver
        </a>
      </td>

      @auth
        @if (Auth::user()->email == 'admin@admin.cat')

        <td class="text-center">
          <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">
            Editar
          </a>
        </td>

        <td class="text-center">
          <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">
                Eliminar
            </button>
          </form>
        </td>

        @endif
      @endauth

    </tr>
    @endforeach
  </tbody>

</table>

@endsection