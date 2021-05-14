@extends('layouts.guestLayout')

@section('content')
    <div class="col-md-5">
        <form action="{{route('loginAttempt')}}" method="POST">
            @csrf
            <label>Login As</label>
            <select class="form-control" name="role">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>

            <label>Email</label>
            <input class="form-control" type="email" name="email">

            <label>Password</label>
            <input class="form-control" type="password" name="password"><br>

            <button class="btn btn-warning">Submit</button>
        </form>
    </div>
@endsection