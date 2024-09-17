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
            <th scope="col">Tools</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $comic->id }}</th>
                <td>{{ $comic->title }}</td>
                <td>{{ $comic->description }}</td>
                <td><img src="{{ $comic->thumb }}" class="img-thumbnail" alt="{{ $comic->title }}"></td>
                <td>{{ $comic->price }}$</td>
                <td>{{ $comic->series }}</td>
                <td>{{ \Carbon\Carbon::parse($comic->sale_date)->format('d-m-Y') }}</td>
                <td>{{ $comic->type }}</td>
                <td><a href="{{ route('comics.index') }}" class="btn btn-primary">Torna alla lista</a></td>
            </tr>
        </tbody>
    </table>

</div>

@endsection