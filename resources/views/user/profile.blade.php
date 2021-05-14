@extends('layouts.userLayout')

@section('content')
    <div class="col-md-5">
        <form action="{{route('profileUpdate')}}" method="POST">
            @csrf
            @method('PATCH')
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{$user->name}}">

            <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{$user->email}}">

            <label>Phone</label>
            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">

            <label>Password</label>
            <input class="form-control" type="text" name="password" value="{{$user->password}}"><br>

            <button class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection