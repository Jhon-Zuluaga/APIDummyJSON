<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");
        $response = Http::acceptJson()->withToken(Session::get('token'))->get($url . '/users');

        if ($response->successful()) {
            $users = $response->json()['users'];

            return view('user.index', compact('users'));
        } else {
            abort($response->status());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = env('URL_BASE_API', "https://dummyjson.com");

        $response = Http::acceptJson()->withToken(Session::get('token'))->post($url . '/users/add', [
            'firstName' => $request->firstName,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthDate' => $request->birthDate,
            'image' => $request->image
        ]);

        dd($request->all());

        if ($response->successful()) {
            session()->flash('message', 'Usuario creado exitoamente');
            return redirect()->route('user.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('user.create')->withInput()->withErrors($errors);
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

        $response = Http::acceptJson()
            ->withToken(Session::get('token'))
            ->get($url . '/users/' . $id);

        if ($response->successful()) {
            $user = $response->json();
            
            // Formatear la fecha para el input type="date"
            if (isset($user['birthDate'])) {
                $user['birthDate'] = \Carbon\Carbon::parse($user['birthDate'])->format('Y-m-d');
            }
            

            return view('user.edit', compact('user'));
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('user.index')
                ->withInput()
                ->withErrors($errors);
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
        $response = Http::acceptJson()->withToken(Session::get('token'))->put($url . '/users/' . $id, [
            'id' => $request->id,
            'firstname' => $request->firstname,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthDate' => $request->birthDate,
            'images' => [$request->images],
        ]);

        if ($response->successful()) {
            //dd($response->json());
            session()->flash('message', 'Usuario actualizado exitosamente');
            return redirect()->route('user.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('user.edit', $id)
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
            ->delete($url . '/users/' . $id);

        if ($response->successful()) {
            /*ver la respuesta del API
            Si quiere testearlo descomente la línea.
            */
            dd($response->json());

            session()->flash('message', 'Usuario eliminado exitosamente');
            return redirect()->route('user.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'] ?? ['No se pudo eliminar el usuario'];
            return redirect()->route('user.index')
                ->withErrors($errors);
        } else {
            abort($response->status());
        }
    }
}
