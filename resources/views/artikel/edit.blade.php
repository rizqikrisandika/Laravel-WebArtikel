@extends('layout.dashboard')

@section('titledash','Create Artikel')

@section('body')

<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="header-title">Add Artikel</h4>
                            <form method="post" action="/dashboard/{{$artikel->id}}" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $artikel->title }}" id="example-text-input">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Author</label>
                                    <input class="form-control @error('author') is-invalid @enderror" type="text" name="author" value="{{ $artikel->author }}" id="example-search-input">
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" aria-label="With textarea" name="content" cols="30" rows="10">{{ $artikel->content }}</textarea>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('media/'.$artikel->image)}}" style="max-height:300px;max-width:300px;" alt=""srcset="">
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Image</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ $artikel->image }}" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Published at</label>
                                    <input class="form-control @error('published_at') is-invalid @enderror" type="date" name="published_at" value="{{ $artikel->published_at }}" id="example-text-input">
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

            </div>
        </div>
    </div>
</div>
</div>

@endsection
