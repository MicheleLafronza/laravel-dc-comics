{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layout.main')

@section('content')

<div class="container my-5">

  @if (session('deleted'))
    <div class="alert alert-success" role="alert"> {{ session('deleted') }}</div>
  @endif

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
                <td>
                  <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Details</a>
                  <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Edit</a>
                  <form action="{{ route('comics.destroy', $comic) }}" method="POST" onsubmit="return confirm('Sei sicuro di eliminare il fumetto {{ $comic->title }}?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Elimina</button>
                  </form>
                </td>

                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


  @endsection