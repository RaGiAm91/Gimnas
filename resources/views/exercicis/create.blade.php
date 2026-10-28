@extends('layouts.master')

@section('titulo', 'Crear Exercici')

@section('content')

<div class="container mt-4">
    <h2>Crear Exercici</h2>

    <form action="{{ route('exercicis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label>Nom</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" required>
        @error('nom')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
    </div>

<div class="mb-3">
    <label>Descripció</label>
    <textarea name="descripcio" class="form-control @error('descripcio') is-invalid @enderror">{{ old('descripcio') }}</textarea>
    @error('descripcio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Imatge</label>
            <input type="file" name="imatge" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('exercicis.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

@endsection