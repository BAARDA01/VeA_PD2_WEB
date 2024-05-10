<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\filma;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;


class filmaController extends Controller implements HasMiddleware
{
// call auth middleware
public static function middleware(): array
{
return [
'auth',
];
}
// display all filmas
public function list(): View
{
$items = filmas::orderBy('name', 'asc')->get();
return view(
'filma.list',
[
'title' => 'Filmas',
'items' => $items
]
);
}
// display new filma form
public function create(): View
{
$authors = Author::orderBy('name', 'asc')->get();
return view(
'filma.form',
[
'title' => 'Pievienot grāmatu',
'filma' => new filma(),
'authors' => $authors,
]
);
}
// create new filma entry
public function put(Request $request): RedirectResponse
{
$validatedData = $request->validate([
'name' => 'required|min:3|max:256',
'author_id' => 'required',
'description' => 'nullable',
'price' => 'nullable|numeric',
'year' => 'numeric',
'image' => 'nullable|image',
'display' => 'nullable',
]);
$filma = new filma();
$filma->name = $validatedData['name'];
$filma->author_id = $validatedData['author_id'];
$filma->description = $validatedData['description'];
$filma->price = $validatedData['price'];
$filma->year = $validatedData['year'];
$filma->display = (bool) ($validatedData['display'] ?? false);
$filma->save();
return redirect('/filmas');
}


}
