{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layout.main')

@section('content')

<div class="container my-5">

    <h1 class="text-center">Modifica il fumetto</h1>

<form action="{{ route('comics.update', $comic) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description">{{ $comic->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="thumb" class="form-label">URL immagine</label>
        <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
    </div>
    <div class="mb-3">
        <label for="series" class="form-label">Serie</label>
        <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label">Data di uscita</label>
        <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo di fumetto</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>




@endsection