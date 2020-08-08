@extends('layout/main')

@section('title','Home')

@section('container')

<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('assets/satu.jpg')}}" style="width: 100%" alt="Los Angeles">
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/dua.jpg')}}" style="width: 100%" alt="Chicago">
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/tiga.jpg')}}" style="width: 100%" alt="New York">
      </div>
    </div>
  
    <!-- Left and right controls -->
    
  
  </div>

<div class="container">
    <h1 class="text-center mt-3">Artikel</h1>
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
