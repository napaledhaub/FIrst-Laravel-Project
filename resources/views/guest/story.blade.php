@extends('layouts.guestLayout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{$article->title}}</h3>
            <p>{{$article->description}}</p>
            <a class="btn btn-warning" href="{{route('home')}}">Home</a>
            <img src="/image/{{$article->image}}" class="img-fluid"/>
        </div>
    </div>
@endsection