@extends('layouts.guestLayout')

@section('content')
    <div class="row">
        @foreach($articleList as $list)
            <div class="col-md-4">
                <div class="card-body">
                    <h6>{{$list->title}}</h6>
                    <p class="card-text">{{$list->description}}</p>
                    <a class="btn btn-warning" href="{{route('detail', $list->id)}}">Full story</a>
                    <a class="btn btn-warning" href="{{route('category', $list->category->id)}}">{{$list->category->name}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
