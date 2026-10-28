@extends('layouts.master')

@section('titulo', 'Crear Categoría')

@section('content')

<div class="container mt-4">
    <h2>Crear Categoría</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" 
                required>
            @error('nom')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Descripció</label>
            <textarea name="descripcio" class="form-control @error('descripcio') is-invalid @enderror">{{ old('descripcio') }}
            </textarea>

            @error('descripcio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Crear
        </button>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>
</div>

@endsection