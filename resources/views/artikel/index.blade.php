@extends('layout.main')

@section('title','Dashboard')

@section('container')
<div class="container">

    <div class="row">
        <div class="col col-md-6">
            <h1 class="mt-3">Daftar Artikel</h1>
        </div>
        <div class="col col-md-6">
            <a class="btn btn-primary mt-4" style="float: right" href="{{url('/dashboard/create')}}">Add Data</a>
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
    </div>
    @endif


    <div class="table-responsive">
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Content</th>
                    <th scope="col">Published At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikels as $artikel)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$artikel->title}}</td>
                    <td>{{$artikel->author}}</td>
                    <td>{{$artikel->content}}</td>
                    <td>{{$artikel->published_at}}</td>
                    <td>
                    <a href="/dashboard/{{$artikel->id}}/edit" class="btn btn-warning">edit</a>
                        <form action="/dashboard/{{$artikel->id}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="javascript: return confirm('Are you sure delete {{$artikel->title}}?')">delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>



</div>
@endsection


