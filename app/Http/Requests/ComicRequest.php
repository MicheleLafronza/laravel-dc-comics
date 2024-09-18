<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // array con le regole
            'title' => 'required|min:3|max:150',
            'description' => 'required|min:5',
            'thumb' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'series' => 'required|min:3|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:50' 
        ];
    }

    public function messages(){

        return [

            // array con i messaggi
            'title.required' => 'titolo richiesto',
            'title.min' => 'richiesti almeno :min caratteri per il titolo',
            'title.max' => 'massimo :max caratteri per il titolo',
            'description.required' => 'descrizione richiesta',
            'description.min' => 'richiesti almeno :min per la descrizione',
            'thumb.required' => 'immagine richiesta',
            'thumb.min' => 'l\'url immagine deve essere più lungo di :min caratteri',
            'thumb.max' => 'url troppo lungo, massimo :max caratteri',
            'price.required' => 'deve essere indicato un prezzo',
            'price.numeric' => 'il prezzo deve essere un numero',
            'series.required' => 'il campo della serie non può essere vuoto',
            'series.min' => 'il campo della serie deve avere minimo :min caratteri',
            'series.max' => 'il campo della serie deve avere massimo :max caratteri',
            'sale_date.required' => 'deve essere indicata la data di uscita del fumetto',
            'sale_date.date' => 'la data di uscita non è nel formato data',
            'type.required' => 'bisogna indicare il tipo di fumetto',
            'type.min' => 'il campo del tipo deve avere minimo :min caratteri',
            'type.max' => 'il campo del tipo deve massimo :max caratteri'

        ];

    }
}
