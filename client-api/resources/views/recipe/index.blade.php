@extends('templates.base')
@section('title','Recetas')
@section('header', 'Recetas')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4 d-grid gap-2 d-md-block">
            <a href="{{ route('recipe.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>    
    
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>difficulty</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <body>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td>{{ $recipe['id'] }}</td>
                            <td>{{ $recipe['name'] }}</td>
                            <td>{{ $recipe['difficulty'] }}</td>
                            <td>
                                <a href="{{ route('recipe.edit', $recipe['id']) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('recipe.destroy', $recipe['id']) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta receta?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection