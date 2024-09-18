<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Http\Requests\ComicRequest;

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
    public function store(ComicRequest $request)
    {
        // // validate
        // $request->validate([
           
        //     // primo array con le regole
        //     'title' => 'required|min:3|max:150',
        //     'description' => 'required|min:5',
        //     'thumb' => 'required|min:3|max:255',
        //     'price' => 'required|numeric',
        //     'series' => 'required|min:3|max:255',
        //     'sale_date' => 'required|date',
        //     'type' => 'required|min:3|max:50' 

        // ],

        // [
        //     // secondo array con i messaggi
        //     'title.required' => 'titolo richiesto',
        //     'title.min' => 'richiesti almeno :min caratteri per il titolo',
        //     'title.max' => 'massimo :max caratteri per il titolo',
        //     'description.required' => 'descrizione richiesta',
        //     'description.min' => 'richiesti almeno :min per la descrizione',
        //     'thumb.required' => 'immagine richiesta',
        //     'thumb.min' => 'l\'url immagine deve essere più lungo di :min caratteri',
        //     'thumb.max' => 'url troppo lungo, massimo :max caratteri',
        //     'price.required' => 'deve essere indicato un prezzo',
        //     'price.numeric' => 'il prezzo deve essere un numero',
        //     'series.required' => 'il campo della serie non può essere vuoto',
        //     'series.min' => 'il campo della serie deve avere minimo :min caratteri',
        //     'series.max' => 'il campo della serie deve avere massimo :max caratteri',
        //     'sale_date.required' => 'deve essere indicata la data di uscita del fumetto',
        //     'sale_date.date' => 'la data di uscita non è nel formato data',
        //     'type.required' => 'bisogna indicare il tipo di fumetto',
        //     'type.min' => 'il campo del tipo deve avere minimo :min caratteri',
        //     'type.max' => 'il campo del tipo deve massimo :max caratteri'
        // ]
    
    // );

        // prendo i dati e li salvo in una variabile
        $comic = $request->all();

        // inserimento con fillable
        $newComic = new Comic();
        $newComic->slug = Helper::generateSlug($comic['title'], Comic::class);
        $newComic->fill($comic);
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
    public function update(ComicRequest $request, string $id)
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
        $comic = Comic::find($id);

        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', 'Il fumetto ' . $comic->title . ' è stato eliminato corretamente');
    }
}
