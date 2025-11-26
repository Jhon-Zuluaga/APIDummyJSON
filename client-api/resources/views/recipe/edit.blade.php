@extends('templates.base')
@section('title','Editar recetas')
@section('header', 'Editar recetas')
@section('content')
    @include('templates.messages')
    <div class="row">
         <div class="col-lg-12 mb-4">
            <form action="{{ route('recipe.update', $recipe['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="ingredients">Ingredientes</label>
                        <input type="text" class="form-control" name="inredients" id="inredients" required value="{{ old('inredients') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="instructions">Instrucciones</label>
                        <input type="text" class="form-control" name="instructions" id="instructions" required value="{{ old('instructions') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="difficulty">Dificultad</label>
                        <input type="text" class="form-control" name="difficulty" id="difficulty" required value="{{ old('difficulty') }}">
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('recipe.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>
@endsection