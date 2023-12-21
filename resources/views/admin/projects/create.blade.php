@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-4">Crea il tuo progetto</h1>
            <form action="{{ route('admin.projects.store') }}" method="POST">
                
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{old('title')}}">
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Url immagine</label>
                    <input type="text" class="form-control" name="thumb" id="thumb" placeholder="Url Immagine" value="{{old('thumb')}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{old('slug')}}">
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" value="Aggiungi">
                </div>

            </form>

            @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>
@endsection