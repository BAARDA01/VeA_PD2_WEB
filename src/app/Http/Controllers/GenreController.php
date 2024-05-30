<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;


class GenreController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }


    // display all Genres
    public function list():View
{
    $items = Genre::orderBy('name', 'asc')->get();
    $genres = Genre::orderBy('name', 'asc')->get();
    return view(
        'genre.list',
        [
            'title' => 'Žanrs',
            'items' => $items,
            'genres' => $genres
        ]
    );
}


    //display new Genre form
    public function create():View
{
    $genres = Genre::all();
    return view(
        'genre.form',
        [
            'title' => 'Pievienot žanru',
            'genre' => new Genre,
            'genres' => $genres
        ]
    );
}

    // creates new Genre data
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $genres = new Genre();
        $genres->name = $validatedData['name'];
        $genres->save();
    
        return redirect('/genre');
    }

    //display Genre edit form
    public function update(Genre $genre):View
{
    $genres = Genre::all();
    return view(
        'genre.form',
        [
            'title' => 'Rediģēt žanru',
            'genre' => $genre,
            'genres' => $genres
        ]
    );
}

    // update Genre data
public function patch(Genre $genre, Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $genre->name = $validatedData['name'];
    $genre->save();

    return redirect('/genre');
}


    // delete Genre
    public function delete(Genre $genres): RedirectResponse
    {
        // šeit derētu pārbaude, kas neļauj dzēst autoru, ja tas piesaistīts eksistējošām grāmatām
        $genres->delete();
        return redirect('/genre');
    }
  

}