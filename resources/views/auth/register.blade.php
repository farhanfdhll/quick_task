@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-4">
            <h2 class="text-center" style="color: black">
                <strong>Register Account</strong>
            </h2>
        </div>
        <div class="my-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Full Name</p></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Email</p></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center mx-auto mb-3" style="width: 50%">
                    <span class="input-group" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Gender</p></span>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check custom" name="gender" id="male" autocomplete="off" checked value="Male">
                        <label class="btn btn-outline-dark custom"  for="male">Male</label>

                        <input type="radio" class="btn-check custom" name="gender" id="female" autocomplete="off" value="Female">
                        <label class="btn btn-outline-dark custom" for="female">Female</label>

                        <input type="radio" class="btn-check custom" name="gender" id="pnts" autocomplete="off" value="Prefer not to say">
                        <label class="btn btn-outline-dark custom" for="pnts">Prefer not to say.</label>
                    </div>
                </div>

                <div class="input-group mt-4 mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Password</p></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-4 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Confirm Password</p></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="row mb-0">
                    <div class="col text-center">
                        <button style="width: 30%" type="submit" class="btn btn-dark">
                            <p class="fw-bold m-0" style="color: white">Register</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
