@extends('layout/main')

@section('title','Home')

@section('container')
<div class="container">
    <div class="row">
        @foreach($artikels as $artikel)
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <a href="/{{ $artikel->id }}">
                        <h5 class="card-title">{{$artikel->title}}</h5>
                    </a>
                    <p class="card-text" style="width: 300px">{{$artikel->content}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{$artikel->published_at}}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
