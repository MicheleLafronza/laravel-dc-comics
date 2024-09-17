{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layout.main')

@section('content')

<div class="container my-5">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Immagine</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Serie</th>
            <th scope="col">Release</th>
            <th scope="col">Tipo</th>
            <th scope="col">Dettagli</th>
          </tr>
        </thead>
        <tbody>
    
            @foreach ($comics as $comic)
            <tr>
                <th scope="row">{{ $comic->id }}</th>
                <td>{{ $comic->title }}</td>
                <td>{{ $comic->description }}</td>
                <td><img src="{{ $comic->thumb }}" class="img-thumbnail" alt="{{ $comic->title }}"></td>
                <td>{{ $comic->price }}$</td>
                <td>{{ $comic->series }}</td>
                <td>{{ \Carbon\Carbon::parse($comic->sale_date)->format('d-m-Y') }}</td>
                <td>{{ $comic->type }}</td>
                <td><a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Details</a></td>
                <td><a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Edit</a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


  @endsection