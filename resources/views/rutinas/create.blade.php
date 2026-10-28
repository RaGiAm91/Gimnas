@extends('layouts.master')

@section('titulo', 'Create')

@section('content')
<div class="row">
   <div class="offset-md-3 col-md-6">
      <div class="card shadow border-0">
         <div class="card-header text-center bg-primary-subtle">
            Añadir rutina
         </div>
         
         <div class="card-body p-2">
            <form action="{{ route('rutinas.store') }}" method="POST">
            @csrf

            <div class="form-group">
               <label for="nom">Nom</label>
               <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" required>
            @error('nom')
            <div class="invalid-feedback">
            {{$message}}
            </div>
            @enderror
            </div>


            <div class="form-group">
                <label for="resum">Resum</label>
                <input type="text" name="resum" id="resum" class="form-control @error('resum') is-invalid @enderror" required>
               @error('resum')
               <div class="invalid-feedback">
               {{$message}}
            </div>
            @enderror
            </div>

            <div class="form-group">
                <label for="duracio">Duracio</label>
                <input type="number" name="duracio" id="duracio" class="form-control @error('duracio') is-invalid @enderror" required>
               @error('duracio')
               <div class="invalid-feedback">
               {{$message}}
            </div>
            @enderror
            </div>
    

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                  Añadir rutina
               </button>
            </div>

            </form>
         </div>
      </div>
   </div>
</div>

@endsection