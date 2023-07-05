@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('failed') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4 mb-2">
            <h2 class="text-center" style="color: black">
                <strong>Manage Users</strong>
            </h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th class="col-2 text-center" scope="col">Gender</th>
                    <th class="col-2 text-center" scope="col">Role</th>
                    <th class ="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($user->isNotEmpty())
                    @foreach ($user as $t)
                    <tr>
                        <td>{{$t->name}}</td>
                        <td>{{$t->email}}</td>
                        <td class="text-center">{{$t->gender}}</td>
                        <td class="text-center">
                            @if ($t->is_admin == 1)
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td>
                            <div class="d-grid gap-2 d-md-block mx-auto text-center">

                                <a href="{{route('admin.promoteUser', $t->id)}}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-success btn-sm my-1 text-center" type="button"></button></a>
                                <a href="{{route('admin.demoteUser', $t->id)}}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-warning btn-sm my-1 text-center" type="button"></button></a>
                                <a href="{{route('admin.deleteUser', $t->id)}}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-danger btn-sm my-1 text-center" type="button"></button></a>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                @else
                    <tr>
                        <td>No Task..</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
            </table>

            <div class="text-end">
            <h5>Legend</h5>
            <div class="my-1">
                <span class="mx-2">Promote to Admin</span><a class="mx-auto" href=""><button style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-success btn-sm text-center" type="button"></button></a>
            </div>
            <div class="my-1">
                <span class="mx-2">Demote to Member</span><a class="mx-auto" href=""><button style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-warning btn-sm text-center" type="button"></button></a>
            </div>
            <div class="my-1">
                <span class="mx-2">Delete User</span><a class="mx-auto" href=""><button style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-danger btn-sm text-center" type="button"></button></a>
            </div>

            </div>

        </div>
    </div>
</div>
@endsection
