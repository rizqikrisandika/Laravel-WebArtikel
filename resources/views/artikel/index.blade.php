@extends('layout.dashboard')

@section('titledash','Dashboard')

@section('body')

<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data Artikel</h4>
                    <a href="{{route('create.artikel')}}" class="btn btn-primary">Add Artikel</a><br><br>

                    @if (session('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Published at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikels as $artikel)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$artikel->title}}</td>
                                    <td>{{$artikel->author}}</td>
                                    <td><img src="{{asset('media/'.$artikel->image)}}"
                                            style="max-height:100px;max-width:100px;" alt="" srcset=""></td>
                                    <td>{{$artikel->content}}</td>
                                    @if( $artikel->status == 'draft')
                                    <td><span class="badge badge-warning">Draft</span></td>
                                    @else
                                    <td><span class="badge badge-success">Relesead</span></td>
                                    @endif
                                    <td>
                                        {{$artikel->published_at}}
                                    </td>
                                    <td>
                                        <a href="/dashboard/{{$artikel->id}}/edit" class="btn btn-warning">edit</a>
                                        <form action="/dashboard/{{$artikel->id}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="javascript: return confirm('Are you sure delete {{$artikel->title}}?')">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
