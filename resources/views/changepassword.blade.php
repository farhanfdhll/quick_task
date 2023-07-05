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
                <strong>Change Password</strong>
            </h2>
        </div>
        <div class="my-4">
            <form method="POST" action="{{ route('updatePassword') }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mt-4 mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Old Password</p></span>
                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="new-password">

                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mt-4 mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">New Password</p></span>
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

                <div class="row mb-0 mt-5">
                    <div class="col text-center">
                        <button style="width: 30%" type="submit" class="btn btn-outline-dark">
                            <p class="fw-bold m-0" style="color: black">Change Password</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
