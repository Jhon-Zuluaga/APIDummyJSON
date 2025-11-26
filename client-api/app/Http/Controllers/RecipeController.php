<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");
        $response = Http::acceptJson()->withToken(Session::get('token'))->get($url . '/recipes');

        if ($response->successful()) {
            $recipes = $response->json()['recipes'];

            return view('recipe.index', compact('recipes'));
        } else {
            abort($response->status());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");

        $response = Http::acceptJson()->withToken(Session::get('token'))->post($url . '/recipes/add', [
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'difficulty' => $request->difficulty
        ]);

        /*
      Está linea de abajo es para que se vea la respuesta de la API en formato JSON
      Al crear un nuevo Receta. (Testearla para saber como funciona)

      IMAGE URL PARA CREAR UN Receta DE PRUEBA: https://i.dummyjson.com/data/recipes/1/1.jpg
      Si quiere testearlo descomente la línea.
    */
        dd($response->json());

        if ($response->successful()) {
            session()->flash('message', 'Receta creada exitosamente');
            return redirect()->route('recipe.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('recipe.create')->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");
        $response = Http::acceptJson()->withToken(Session::get('token'))->get($url . '/recipes/' . $id);

        if ($response->successful()) {
            $recipe = $response->json();
            return view('recipe.edit', compact('recipe'));
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('recipe.index')
                ->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");
        $response = Http::acceptJson()->withToken(Session::get('token'))->put($url . '/recipes/' . $id, [
            'id' => $request->id,
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'difficulty' => $request->difficulty
        ]);

        if ($response->successful()) {
            /*
      Lo mismo que en el método store, para ver la respuesta y actualización
      de la receta en formato JSON. Si quiere testearlo descomente la línea.
      */
            dd($response->json());
            session()->flash('message', 'Receta actualizada exitosamente');
            return redirect()->route('recipe.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('recipe.edit', $id)
                ->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");

        $response = Http::acceptJson()
            ->withToken(Session::get('token'))
            ->delete($url . '/recipes/' . $id);

        if ($response->successful()) {
            /*ver la respuesta del API
        Si quiere testearlo descomente la línea.
        */
            //dd($response->json());

            session()->flash('message', 'Receta eliminada exitosamente');
            return redirect()->route('recipe.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'] ?? ['No se pudo eliminar la receta'];
            return redirect()->route('recipe.index')
                ->withErrors($errors);
        } else {
            abort($response->status());
        }
    }
}
