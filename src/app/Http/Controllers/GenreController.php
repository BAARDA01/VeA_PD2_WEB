<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controllers\HasMiddleware;


class GenreController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }
    //šeit tiek izmantota "middleware" - vairākos tīmekļa satvaros ir šāds mehānisms,
    //kas ļauj veikt apstrādi visiem HTTP pieprasījumiem pirms un pēc kontrolieru metodēm
    //šeit izmantojam iebūvēto "auth" midlevāri, kas pārbauda, vai lietotājs ir autentificēts


    //display all genres
    public function list(): View
    {

        $items = Genre::orderBy('name', 'asc')->get();

        return view(
            'genre.list',
            [
                'title' => 'Autori',
                'items' => $items,
            ]
        );
    }

    // display new genre form
    public function create(): View
    {
        return view(
            'genre.form',
            [
                'title' => 'Pievienot autoru',
                'genre' => new Genre(),

            ]
        );
    }


    // creates new genre data
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }



    // display genre edit form
    public function update(Genre $genre): View
    {
        return view(
            'genre.form',
            [
                'title' => 'Rediģēt autoru',
                'genre' => $genre,
            ]
        );
    }

    // update genre data
    public function patch(Genre $genre, Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }

    // delete genre
    public function delete(Genre $genre): RedirectResponse
    {
        // šeit derētu pārbaude, kas neļauj dzēst autoru, ja tas piesaistīts eksistējošām grāmatām
        $genre->delete();
        return redirect('/genres');
    }

    
}