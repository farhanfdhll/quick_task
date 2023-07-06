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
            @auth
                @if (Auth::user()->is_admin == 1)
                    <div class="text-center" >
                        <img src="{{ asset('storage/BannerAdmin.png') }}" style="width: 65vw; border-radius:30px;s" class="shadow" alt="">
                    </div>
                @else
                <div class="mt-4 mb-2">
                    <h2 class="text-center" style="color: black">
                        <strong>Your To Do's!</strong>
                    </h2>
                </div>
                <div class="text-center mb-1 d-flex" style='border-radius: 10px; height: 5vh; outline-color: black; outline-style: solid; outline-width: 1px'>
                    <p class="my-auto mx-auto" style="color: black">Filter(s)</p>
                </div>
                <div class="col-md-12">
                    <form action="/home" method="get">@csrf
                        <div class="row justify-content-center">
                            <div class="col-8">
                                @if (request('sort') == 1)
                                    <select class=" input-group form-select my-1" name="sort" id="filter">
                                        <option class="form-control" disabled>Sort by..</option>
                                        <option class="form-control" selected value="1">Due Dates</option>
                                        <option class="form-control" value="2">Status</option>
                                        <option class="form-control" value="3">Priority</option>
                                        <option class="form-control" value="4">Task Name</option>
                                    </select>
                                @elseif (request('sort') == 1)
                                    <select class=" input-group form-select my-1" name="sort" id="filter">
                                        <option class="form-control" disabled>Sort by..</option>
                                        <option class="form-control" value="1">Due Dates</option>
                                        <option class="form-control" selected value="2">Status</option>
                                        <option class="form-control" value="3">Priority</option>
                                        <option class="form-control" value="4">Task Name</option>
                                    </select>
                                @elseif (request('sort') == 2)
                                    <select class=" input-group form-select my-1" name="sort" id="filter">
                                        <option class="form-control" disabled>Sort by..</option>
                                        <option class="form-control" value="1">Due Dates</option>
                                        <option class="form-control" selected value="2">Status</option>
                                        <option class="form-control" value="3">Priority</option>
                                        <option class="form-control" value="4">Task Name</option>
                                    </select>
                                @elseif (request('sort') == 3)
                                    <select class=" input-group form-select my-1" name="sort" id="filter">
                                        <option class="form-control" disabled>Sort by..</option>
                                        <option class="form-control" value="1">Due Dates</option>
                                        <option class="form-control" value="2">Status</option>
                                        <option class="form-control" selected value="3">Priority</option>
                                        <option class="form-control" value="4">Task Name</option>
                                    </select>
                                @elseif (request('sort') == 4)
                                <select class=" input-group form-select my-1" name="sort" id="filter">
                                    <option class="form-control" disabled>Sort by..</option>
                                    <option class="form-control" value="1">Due Dates</option>
                                    <option class="form-control" value="2">Status</option>
                                    <option class="form-control" value="3">Priority</option>
                                    <option class="form-control" selected value="4">Task Name</option>
                                </select>
                                @else
                                    <select class=" input-group form-select my-1" name="sort" id="filter">
                                        <option class="form-control" selected disabled>Sort by..</option>
                                        <option class="form-control" value="1">Due Dates</option>
                                        <option class="form-control" value="2">Status</option>
                                        <option class="form-control" value="3">Priority</option>
                                        <option class="form-control" value="4">Task Name</option>
                                    </select>
                                @endif

                            </div>
                            <div class="col-2 mt-1">
                                <button class="btn btn-dark" type="submit">Apply Sort</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <form action="/home" method="get">@csrf
                        <div class="row justify-content-center">
                            <div class="col-8">
                                @if (request('filter') == 1)
                                    <select class=" input-group form-select my-1" name="filter" id="filter">
                                        <option class="form-control" disabled>Select filters..</option>
                                        <option class="form-control" selected value="1">Show Priority Task(s)</option>
                                        <option class="form-control" value="2">Show Unfinished Task(s)</option>
                                        <option class="form-control" value="3">Show Finished Task(s)</option>
                                    </select>
                                @elseif (request('filter') == 2)
                                <select class=" input-group form-select my-1" name="filter" id="filter">
                                    <option class="form-control" disabled>Select filters..</option>
                                    <option class="form-control" value="1">Show Priority Task(s)</option>
                                    <option class="form-control" selected value="2">Show Unfinished Task(s)</option>
                                    <option class="form-control" value="3">Show Finished Task(s)</option>
                                </select>
                                @elseif (request('filter') == 3)
                                <select class=" input-group form-select my-1" name="filter" id="filter">
                                    <option class="form-control" disabled>Select filters..</option>
                                    <option class="form-control" value="1">Show Priority Task(s)</option>
                                    <option class="form-control" value="2">Show Unfinished Task(s)</option>
                                    <option class="form-control" selected value="3">Show Finished Task(s)</option>
                                </select>
                                @else
                                    <select class=" input-group form-select my-1" name="filter" id="filter">
                                        <option class="form-control" selected disabled>Select filters..</option>
                                        <option class="form-control" value="1">Show Priority Task(s)</option>
                                        <option class="form-control" value="2">Show Unfinished Task(s)</option>
                                        <option class="form-control" value="3">Show Finished Task(s)</option>
                                    </select>
                                @endif
                                <a class="my-1 btn btn-outline-dark" href="{{route('home')}}">Clear Filter/Sort</a>
                            </div>
                            <div class="col-2 mt-1">
                                <button class="btn btn-dark" type="submit">Apply Filter</button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-2 text-center" scope="col">Due Date</th>
                            <th class="col-3" scope="col">Task Name</th>
                            <th scope="col">Description</th>
                            <th class="col-1 text-center" scope="col">Priority ?</th>
                            <th class="col-1 text-center" scope="col">Task Status</th>
                            <th class ="text-center col-3" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($task->isNotEmpty())
                            @foreach ($task as $t)
                            <tr>
                                <td class="text-center">{{$t->due_date}}</td>
                                <td>{{$t->name}}</td>
                                <td>{{$t->description}}</td>
                                <td class="text-center">
                                    @if ($t->is_important == 1)
                                        Medium
                                    @elseif($t->is_important == 2)
                                        High
                                    @else
                                        Low
                                    @endif
                                </td>
                                <td class="text-center">{{$t->status}}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block mx-auto text-center">
                                        <a href="{{ route('member.edit-task-page', $t->id) }}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-info btn-sm my-1 text-center" type="button"></button></a>
                                        <a href="{{ route('member.markStatusDone', $t->id) }}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-success btn-sm my-1 text-center" type="button"></button></a>
                                        <a href="{{ route('member.markStatusProgress', $t->id) }}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-secondary btn-sm my-1 text-center" type="button"></button></a>
                                        <a href="{{ route('member.markPriority', $t->id) }}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-warning btn-sm my-1 text-center" type="button"></button></a>
                                        <a href="{{ route('member.removeTask', $t->id) }}"><button style="border-radius: 50%;width: 20px; height:20px" class="btn btn-danger btn-sm my-1 text-center" type="button"></button></a>
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
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                  </table>

                  <div class="text-end">
                    <h5>Legend</h5>
                    <div class="my-1">
                        <span class="mx-2" style="pointer-events: none">Edit Task <a class="mx-auto" href=""><button disabled style="border-radius: 50%;width: 1vw; height:1vw;" class="btn btn-info btn-sm text-center" type="button"></button></a></span>
                    </div>
                    <div class="my-1">
                        <span class="mx-2" style="pointer-events: none">Mark as 'Done' <a class="mx-auto" href=""><button disabled style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-success btn-sm text-center" type="button"></button></a></span>
                    </div>
                    <div class="my-1">
                        <span class="mx-2" style="pointer-events: none">Mark as 'On Progress' <a class="mx-auto" href=""><button disabled style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-secondary btn-sm text-center" type="button"></button></a></span>
                    </div>
                    <div class="my-1">
                        <span class="mx-2" style="pointer-events: none">Change Priority <a class="mx-auto" href=""><button disabled style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-warning btn-sm text-center" type="button"></button></a></span>
                    </div>
                    <div class="my-1">
                        <span class="mx-2" style="pointer-events: none">Delete <a class="mx-auto" href=""><button disabled style="border-radius: 50%;width: 1vw; height:1vw" class="btn btn-danger btn-sm text-center" type="button"></button></a></span>
                    </div>

                  </div>

                @endif

            @else
                <div class="text-center" >
                    <img src=" {{ asset('storage/BannerGuest.png') }}" style="width: 65vw; border-radius:30px;s" class="shadow" alt="">
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
