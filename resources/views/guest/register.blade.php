@extends('layouts.guestLayout')

@section('content')
<div class="col-md-5">
    <form action="{{route('registerAttempt')}}" method="POST">
        @csrf
        <label>Name</label>
        <input class="form-control" type="text" name="name">

        <label>Email</label>
        <input class="form-control" type="email" name="email">

        <label>Phone</label>
        <input class="form-control" type="text" name="phone">

        <label>Password</label>
        <input class="form-control" type="password" name="password"><br>

        <button class="btn btn-warning">Submit</button>
    </form>
</div>
@endsection