@extends('templates.base')
@section('title','Inicio')
@section('header','Inicio')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <p align="justify">
                Aqui puedes encontrar todos los Endpoints de la API DummyJSON para que puedas probarlos y ver su funcionamiento.

                <br>
                Para ver la documentacion completa de la API visita el siguiente enlace:
                <a href="https://dummyjson.com/docs" target="_blank">https://dummyjson.com/docs</a>

                <br><br>
                ENDPOINTS:
                <br><br>
                * Users: /users (GET, POST, PUT, DELETE) -> <a href="https://dummyjson.com/docs/users" target="_blank">https://dummyjson.com/docs/users</a>
                <br><br>
                * Products: /products (GET, POST, PUT, DELETE) -> <a href="https://dummyjson.com/docs/products" target="_blank">https://dummyjson.com/docs/products</a>
                <br><br>
                * Recipes: /recipes (GET, POST, PUT, DELETE) -> <a href="https://dummyjson.com/docs/recipes" target="_blank">https://dummyjson.com/docs/recipes</a>
                
            </p>
        </div>

    </div>

@endsection