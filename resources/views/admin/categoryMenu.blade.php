@extends('layouts.adminLayout')

@section('content')
    <div class="col-md-2">
        <form action="{{route('storeCategory')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Name</label>
            <input class="form-control" type="text" name="name"><br>

            <button class="btn btn-warning">Add</button>
        </form>
    </div><br>
    <div class="col-md-2">
        <table class="table">
            <thead><tr><th>Name</th></tr></thead>
            <tbody>
                @foreach($categoryList as $list)
                    <tr><td>{{$list->name}}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection