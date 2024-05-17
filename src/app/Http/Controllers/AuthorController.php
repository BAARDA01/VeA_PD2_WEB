<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controllers\HasMiddleware;


class AuthorController extends Controller implements HasMiddleware
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


    //display all authors
    public function list(): View
    {

        $items = Author::orderBy('name', 'asc')->get();

        return view(
            'author.list',
            [
                'title' => 'Autori',
                'items' => $items,
            ]
        );
    }

    // display new Author form
    public function create(): View
    {
        return view(
            'author.form',
            [
                'title' => 'Pievienot autoru',
                'author' => new Author(),

            ]
        );
    }


    // creates new Author data
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Author();
        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }



    // display Author edit form
    public function update(Author $author): View
    {
        return view(
            'author.form',
            [
                'title' => 'Rediģēt autoru',
                'author' => $author,
            ]
        );
    }

    // update Author data
    public function patch(Author $author, Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }

    // delete Author
    public function delete(Author $author): RedirectResponse
    {
        // šeit derētu pārbaude, kas neļauj dzēst autoru, ja tas piesaistīts eksistējošām grāmatām
        $author->delete();
        return redirect('/authors');
    }

    
}