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
                <strong>Edit Task : {{$task->name}}</strong>
            </h2>
        </div>
        <div class="my-4">
            <form method="POST" action="{{ route('member.updateTask', $task->id) }}">
                @csrf
                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Task Name</p></span>
                    <input id="name" type="text" placeholder="Insert task name" class="form-control" name="name" value="{{ $task->name }}" required autocomplete="name" autofocus>
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Description</p></span>
                    <textarea placeholder="Insert task description" class="form-control" name="description" id="" rows="8" style="resize: none">{{ $task->description }}</textarea>
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Due Date</p></span>
                    <input type="date" class="form-control" name="due_date" value="{{ $task->due_date }}">
                </div>

                <div class="input-group mb-3 mx-auto" style="width: 50%">
                    <span class="input-group-text col-md-3" id="basic-addon1"><p class="m-0 mx-auto fw-bold">Is Task Important?</p></span>
                    <select class="form-select" id="is_important" name="is_important" required>
                        @if ($task->is_important == 1)
                            <option value=0>Low</option>
                            <option selected value=1>Medium</option>
                            <option value=2>High</option>
                        @elseif($task->is_important == 0)
                            <option selected value=0>Low</option>
                            <option value=1>Medium</option>
                            <option value=2>High</option>
                        @else
                            <option value=0>Low</option>
                            <option value=1>Medium</option>
                            <option selected value=2>High</option>
                        @endif


                    </select>
                </div>

                <div class="row mb-0">
                    <div class="col text-center">
                        <button style="width: 30%" type="submit" class="btn btn-dark">
                            <p class="fw-bold m-0" style="color: white">Update Task!</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
