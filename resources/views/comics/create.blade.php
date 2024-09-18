{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layout.main')

@section('content')

<div class="container my-5">

    <h1 class="text-center">Inserisci un nuovo fumetto</h1>

    @if($errors->any())

        <div class="alert alert-dark" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>

    @endif

<form action="{{ route('comics.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" >{{ old('description')}}</textarea>
        @error('description')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="thumb" class="form-label">URL immagine</label>
        <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{ old('thumb') }}">
        @error('thumb')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
        @error('price')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="series" class="form-label">Serie</label>
        <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{ old('series') }}">
        @error('series')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label">Data di uscita</label>
        <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
        @error('sale_date')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo di fumetto</label>
        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
        @error('type')
            <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>




@endsection