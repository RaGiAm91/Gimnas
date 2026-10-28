@extends('layouts.master')
@section('titulo', 'Detalle Rutina')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <img src="{{ asset('img/logoRutina.png') }}" alt="Rutina">
                <h5>#{{ $rutina->id }} - {{ $rutina->nom }}</h5>
                <p><b>Resum:</b> {{ $rutina->resum }}</p>
                <p><b>Duració:</b> {{ $rutina->duracio }} minuts</p>
                <br>
                <a class="btn btn-secondary" href="{{ route('rutinas.index') }}">Volver</a>
                <a class="btn btn-warning" href="{{ route('rutinas.edit', $rutina->id) }}">Modificar</a>
                <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
                <hr>
                <h5>Ejercicios</h5>
                @if($rutina->exercicis->isEmpty())
                    <p>No hay ejercicios en esta rutina</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Descripció</th>
                                <th>Series</th>
                                <th>Repeticions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rutina->exercicis as $exercici)
                                <tr>
                                    <td>{{ $exercici->nom }}</td>
                                    <td>{{ $exercici->descripcio }}</td>
                                    <td>{{ $exercici->pivot->series }}</td>
                                    <td>{{ $exercici->pivot->repeticions }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <hr>
                <h5>Añadir ejercicio</h5>
                <form action="{{ route('rutinas.addExercise', $rutina->id) }}" method="POST" class="row g-2 justify-content-center">
                    @csrf
                    <div class="col-auto">
                        <select name="exercici_id" class="form-control" required>
                            @foreach($exercicis as $exercici)
                                <option value="{{ $exercici->id }}">{{ $exercici->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="series" class="form-control" placeholder="Series" required min="1">
                    </div>
                    <div class="col-auto">
                        <input type="number" name="repeticions" class="form-control" placeholder="Repeticions" required min="1">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </div>
                </form>
                
                <hr>
                <h5>Eliminar ejercicio de la rutina</h5>
                <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Descripció</th>
                                <th>Series</th>
                                <th>Repeticions</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($rutina->exercicis as $exercici)
                <tr>
                <td>{{ $exercici->nom }}</td>
                <td>{{ $exercici->descripcio }}</td>
                <td>{{ $exercici->pivot->series }}</td>
                <td>{{ $exercici->pivot->repeticions }}</td>

                <td>
                <form action="{{ route('rutinas.removeExercise', [$rutina->id, $exercici->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Quitar</button>
                </form>
                </td>
                </tr>
            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>

@endsection