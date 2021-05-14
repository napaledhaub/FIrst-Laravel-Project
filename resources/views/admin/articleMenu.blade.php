@extends('layouts.adminLayout')

@section('content')
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
                            <form action="{{route('destroyArticle', $list->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('fullArticle', $list->id)}}">Full Article</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection