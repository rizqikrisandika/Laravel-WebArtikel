@extends('layout.main')

@section('title','Detail Artikel')

@section('container')
<div class="container">
    <h1 class="mt-3">Detail Artikel</h1>
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="{{asset('media/'.$home->image)}}" class="card-img-top" alt="...">
            </div>
            <div class="card-footer">
                <small class="text-muted">Published at {{$home->published_at}}</small>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">{{$home->title}}</h2>
                <p class="card-text" style="width: 300px">{{$home->content}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
