@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>{{$project->title}}</h1>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{old('title',$project->title)}}">
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Url immagine</label>
                    <input type="text" class="form-control" name="thumb" id="thumb" placeholder="Url Immagine" value="{{old('thumb',$project->thumb)}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description', $project->description)}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{old('slug', $project->slug)}}">
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" value="Conferma modifiche">
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