@extends('layout.main')

@section('title','Create Artikel')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Create Artikel</h1>
            <form class="mt-3" method="POST" action="{{url('dashboard')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                name="title" placeholder="Input Title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror " id="author"
                name="author" placeholder="Input Author" value="{{ old('author') }}">
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"
                        placeholder="Input Content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="image">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="date" class="form-control @error('published_at') is-invalid @enderror" name="published_at" id="published_at" placeholder="" value="{{ old('published_at') }}">
                    @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button name="draft" type="submit" class="btn btn-warning">Draft</button>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div>
</div>
@endsection
