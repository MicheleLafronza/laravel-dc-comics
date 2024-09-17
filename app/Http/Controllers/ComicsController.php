<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Functions\Helper;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comic = $request->all();

        $newComic = new Comic();
        $newComic->title = $comic['title'];
        $newComic->slug = Helper::generateSlug($comic['title'], Comic::class);
        $newComic->description = $comic['description'];
        $newComic->thumb = $comic['thumb'];
        $newComic->price = $comic['price'];
        $newComic->series = $comic['series'];
        $newComic->sale_date = $comic['sale_date'];
        $newComic->type = $comic['type'];
        $newComic->save();
        


        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $comic = Comic::find($id);

    // se il titolo è cambiato genero un nuovo slug, altrimenti no

        if($data['title'] === $comic->title){
            $data['slug'] = $comic->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
