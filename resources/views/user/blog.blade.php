@extends('layouts.userLayout')

@section('content')
    <a class="btn btn-warning" href="{{route('createBlog')}}">Create Blog</a>
    <div class="col-md-10">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articleList as $list)
                    <tr>
                        <td>{{$list->title}}</td>
                        <td>{{$list->category->name}}</td>
                        <td>
                            <form method="POST" action="{{route('destroyBlog', $list->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('fullStory', $list->id)}}">Full Story</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection