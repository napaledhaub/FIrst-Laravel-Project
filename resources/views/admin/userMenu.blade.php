@extends('layouts.adminLayout')

@section('content')
    <div class="col-md-10">
        <table id="userTable" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userList as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->password}}</td>
                        <td>
                            <form action="{{route('destroyUser', $list->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection