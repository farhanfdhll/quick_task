@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
        <div class="mt-4">
            <h2 class="text-center" style="color: black">
                <strong>{{$user->name}}'s Profile</strong>
            </h2>
        </div>
        <div class="my-4">
            <form method="POST" action="{{ route('updateUserProf', ['user' => $user]) }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Full Name</p></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Email</p></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled required autocomplete="email">
                </div>

                <div class="text-center mx-auto mb-3" style="width: 50%">
                    <span class="input-group" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Gender</p></span>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        @if ($user->gender == 'Male')
                            <input type="radio" class="btn-check custom" name="gender" id="male" autocomplete="off" checked value="Male">
                            <label class="btn btn-outline-dark custom"  for="male">Male</label>

                            <input type="radio" class="btn-check custom" name="gender" id="female" autocomplete="off" value="Female">
                            <label class="btn btn-outline-dark custom" for="female">Female</label>

                            <input type="radio" class="btn-check custom" name="gender" id="pnts" autocomplete="off" value="Prefer not to say">
                            <label class="btn btn-outline-dark custom" for="pnts">Prefer not to say.</label>
                        @elseif($user->gender == 'Female')
                            <input type="radio" class="btn-check custom" name="gender" id="male" autocomplete="off" value="Male">
                            <label class="btn btn-outline-dark custom"  for="male">Male</label>

                            <input type="radio" class="btn-check custom" name="gender" checked id="female" autocomplete="off" value="Female">
                            <label class="btn btn-outline-dark custom" for="female">Female</label>

                            <input type="radio" class="btn-check custom" name="gender" id="pnts" autocomplete="off" value="Prefer not to say">
                            <label class="btn btn-outline-dark custom" for="pnts">Prefer not to say.</label>
                        @else
                            <input type="radio" class="btn-check custom" name="gender" id="male" autocomplete="off" value="Male">
                            <label class="btn btn-outline-dark custom"  for="male">Male</label>

                            <input type="radio" class="btn-check custom" name="gender" id="female" autocomplete="off" value="Female">
                            <label class="btn btn-outline-dark custom" for="female">Female</label>

                            <input type="radio" class="btn-check custom" checked name="gender" id="pnts" autocomplete="off" value="Prefer not to say">
                            <label class="btn btn-outline-dark custom" for="pnts">Prefer not to say.</label>
                        @endif

                    </div>
                </div>

                <div class="row mb-0 mt-5">
                    <div class="col text-center">
                        <a href="{{route('changePassword')}}" style="width: 30%" type="button" class="btn btn-outline-dark">
                            <p class="fw-bold m-0" style="color: black">Change Password</p>
                        </a>
                        <button style="width: 30%" type="submit" name="update" class="btn btn-dark">
                            <p class="fw-bold m-0" style="color: white">Update Profile</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
