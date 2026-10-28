@extends('layouts.master')

@section('titulo', 'Editar Rutina')

@section('content')
<div class="row">
   <div class="offset-md-3 col-md-6">
      <div class="card shadow border-0">
         <div class="card-header text-center bg-warning-subtle">
            Editar rutina
         </div>
         
         <div class="card-body p-2">
            <form action="{{ route('rutinas.update', $rutina->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input 
                        type="text" 
                        name="nom" 
                        id="nom" 
                        value="{{ old('nom', $rutina->nom) }}" 
                        class="form-control @error('nom') is-invalid @enderror" 
                        required
                    >
                    @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="resum">Resum</label>
                    <input 
                        type="text" 
                        name="resum" 
                        id="resum" 
                        value="{{ old('resum', $rutina->resum) }}" 
                        class="form-control @error('resum') is-invalid @enderror"
                    >
                    @error('resum')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="duracio">Duració (minuts)</label>
                    <input 
                        type="number" 
                        name="duracio" 
                        id="duracio" 
                        value="{{ old('duracio', $rutina->duracio) }}" 
                        class="form-control @error('duracio') is-invalid @enderror" 
                        required
                    >
                    @error('duracio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-warning">
                        Actualizar rutina
                    </button>

                    <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

            </form>
         </div>
      </div>
   </div>
</div>
@endsection