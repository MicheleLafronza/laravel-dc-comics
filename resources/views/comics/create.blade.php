{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layout.main')

@section('content')

<div class="container my-5">

    <h1 class="text-center">Inserisci un nuovo fumetto</h1>

<form action="{{ route('comics.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="thumb" class="form-label">URL immagine</label>
        <input type="text" class="form-control" id="thumb" name="thumb">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="series" class="form-label">Serie</label>
        <input type="text" class="form-control" id="series" name="series">
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label">Data di uscita</label>
        <input type="date" class="form-control" id="sale_date" name="sale_date">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo di fumetto</label>
        <input type="text" class="form-control" id="type" name="type">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>




@endsection