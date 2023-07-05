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
                <strong>Add New Task!</strong>
            </h2>
        </div>
        <div class="my-4">
            <form method="POST" action="{{ route('member.add-new-task') }}">
                @csrf
                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Task Name</p></span>
                    <input id="name" type="text" placeholder="Insert task name" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Description</p></span>
                    <textarea placeholder="Insert task description" class="form-control" name="description" id="" rows="8" style="resize: none"></textarea>
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Due Date</p></span>
                    <input type="date" class="form-control" name="due_date">
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Is Task Important?</p></span>
                    <select class="form-select" id="is_important" name="is_important" required>
                        <option value=0 selected>Low</option>
                        <option value=1>Medium</option>
                        <option value=2>High</option>
                    </select>
                </div>

                <div class="row mb-0">
                    <div class="col text-center">
                        <button style="width: 30%" type="submit" class="btn btn-dark">
                            <p class="fw-bold m-0" style="color: white">Add Task!</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
