@extends('layout/main')

@section('title','Home')

@section('container')
<div class="container">
    <div class="row">
        @foreach($artikels as $artikel)
        @if( $artikel->deleted_at == NULL and $artikel->status == 'published')
        <div class="col-md-4 mt-3">
            <div class="card">
                <a href="/{{ $artikel->id }}">
                    <img src="{{asset('media/'.$artikel->image)}}" style="width: 100%; height: 20vw; object-fit: cover;"
                        class="card-img-top" alt="" srcset="">

                    <div class="card-body">

                        <h5 class="card-title">{{$artikel->title}}</h5>
                </a>
                <p class="card-text"
                    style="white-space: nowrap; width: 300px; overflow: hidden;text-overflow: ellipsis;">
                    {{$artikel->content}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{$artikel->published_at}}</small>
            </div>
        </div>
    </div>
    @endif

    @endforeach
</div>
</div>
@endsection
