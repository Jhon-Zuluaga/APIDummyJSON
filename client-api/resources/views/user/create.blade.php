@extends('templates.base')

@section('title','Crear Usuarios')
@section('header', 'Crear Usuarios')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="firstName">Nombre</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" required value="{{ old('firstName') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="age">Edad</label>
                        <input type="number" class="form-control" name="age" id="age" required value="{{ old('age') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="email">Correo</label>
                        <input type="text" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="phone">Teléfono</label>
                        <input type="number" step="0.01" class="form-control" name="phone" id="phone" required value="{{ old('phone') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="birthDate">Año Nacimiento</label>
                        <input type="date" class="form-control" name="birthDate" id="birthDate" required value="{{ old('birthDate') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="image">Imagen (URL)</label>
                        <input type="text" class="form-control" name="image" id="image" value="{{ old('image') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
