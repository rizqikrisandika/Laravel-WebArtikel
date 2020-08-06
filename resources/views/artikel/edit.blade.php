@extends('layout.main')

@section('title','Edit Artikel')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Edit Artikel</h1>
            <form class="mt-3" method="POST" action="/dashboard/{{$artikel->id}}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                name="title" placeholder="Input Title" value="{{ $artikel->title }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"
                        placeholder="Input Content">{{ $artikel->content }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="date" class="form-control @error('published_at') is-invalid @enderror" name="published_at" id="published_at" placeholder="" value="{{ $artikel->published_at }}">
                    @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div>
</div>
@endsection
