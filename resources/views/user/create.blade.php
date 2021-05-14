@extends('layouts.userLayout')

@section('content')
    <div class="col-md-5">
        <form action="{{route('storeBlog')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Title</label>
            <input class="form-control" type="text" name="title">

            <label>Category</label>
            <select class="form-control" name="category">
                @foreach($categoryList as $list)
                    <option value="{{$list->id}}">{{$list->name}}</option>
                @endforeach
            </select>

            <label>Photo</label>
            <input class="form-control-file" type="file" name="image">

            <label>Story</label>
            <textarea class="form-control" name="description" rows="5"></textarea><br>

            <button class="btn btn-warning">Create</button>
        </form>
    </div>
@endsection