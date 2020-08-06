@extends('layout.main')

@section('title','Detail Artikel')

@section('container')
<div class="container">
    <h1 class="mt-3">Detail Artikel</h1>
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="/1">
                        <h5 class="card-title">{{$home->title}}</h5>
                    </a>
                    <p class="card-text" style="width: 300px">{{$home->content}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{$home->published_at}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
