@extends('layouts.master')

@section('titulo', 'Detalle Ejercicio')

@section('content')

<div class="container mt-4 bg-warning-subtle">
  <div class="row justify-content-center">
    <div class="card shadow border-0">
      <div class="card-body text-center">

        <img src="{{ asset('img/logoRutina.png') }}" alt="Rutina">

        <h5>#{{ $exercici->id }} - {{ $exercici->nom }}</h5>

        <p><b>Descripción:</b> {{ $exercici->descripcio }}</p>

        @if($exercici->imatge)
            <img src="{{ asset('storage/' . $exercici->imatge) }}" alt="Exercici" class="img-fluid mt-3" width="250">
        @else
            <p>Sin imagen</p>
        @endif

        <br>

        @auth
            @if (Auth::user()->email == 'admin@admin.cat')
                <a class="btn btn-primary"  href="{{ route('exercicis.index') }}">Volver</a>
                <a class="btn btn-warning" href="{{ route('exercicis.edit', $exercici->id) }}">
                Modificar
                </a>   

                <form action="{{ route('exercicis.destroy', $exercici->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            @endif
        @endauth

        <hr>

        

      </div>
    </div>
  </div>
</div>

@endsection