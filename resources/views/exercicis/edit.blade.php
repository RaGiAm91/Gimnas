@extends('layouts.master')
@section('titulo', 'Editar Exercici')
@section('content')
<div class="container mt-4">
    <h2>Editar Exercici</h2>
    <form action="{{ route('exercicis.update', $exercici->id) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" 
                   value="{{ $exercici->nom }}" required>
        </div>
        <div class="mb-3">
            <label>Descripció</label>
            <textarea name="descripcio" class="form-control">{{ $exercici->descripcio }}</textarea>
        </div>
        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ $categoria->id == $exercici->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Imatge</label>
            <input type="file" name="imatge" class="form-control">
            @if($exercici->imatge)
                <img src="{{ asset('storage/' . $exercici->imatge) }}" 
                     alt="{{ $exercici->nom }}" 
                     class="mt-2" style="max-height: 150px;">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('exercicis.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection