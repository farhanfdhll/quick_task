@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-4">
                <h2 class="text-center">
                    <strong>Login</strong>
                </h2>
            </div>
            <div class="my-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3 mx-auto" style="width: 50%">
                        <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto"><strong>Email</strong></p></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3 mx-auto" style="width: 50%">
                        <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto"><strong>Password</strong></p></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col text-center">
                            <button style="width: 30%;" type="submit" class="btn btn-dark">
                                <p class="fw-bold m-0" style="color: white">Login</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
