<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>QuickTask!</title>
  </head>
  <body class="bg-light">
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mx-3" href="{{route('home')}}"><img src="{{ asset('storage/Logo.png') }}" alt="Logo" style="height: 10vh"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                    {{-- <a class="nav-link" aria-current="page" href="/home" style="font-family: Quicksand; color:white">Home</a> --}}
                @auth
                    @if(Auth::user()->is_admin == 1)
                        {{-- ADMIN VIEW --}}
                        <li class="nav-item mx-2">
                            <a style="font-family: Quicksand; color:white" class="nav-link" href="{{route('home')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                Home
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a style="font-family: Quicksand; color:white" class="nav-link" href="{{route('admin.manageUsersPage')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                Manage Users
                            </a>
                        </li>

                        <li class="nav-item  mx-2 dropdown ">
                            <a style="font-family: Quicksand; color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Hello! {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="font-family: Quicksand; color:black" href="{{route('viewProfilePage')}}">
                                    View Profile
                                </a>
                                <a class="dropdown-item" style="font-family: Quicksand; color:black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        {{-- MEMBER VIEW --}}
                        <li class="nav-item">
                            <li class="nav-item mx-2">
                                <a style="font-family: Quicksand; color:white" class="nav-link" href="{{route('home')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a style="font-family: Quicksand; color:white" class="nav-link" href="{{route('member.add-task-page')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Add New Task
                                </a>
                            </li>
                            <li class="nav-item  mx-2 dropdown ">
                                <a style="font-family: Quicksand; color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello! {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="font-family: Quicksand; color:black" href="{{route('viewProfilePage')}}">
                                        View Profile
                                    </a>
                                    <a class="dropdown-item" style="font-family: Quicksand; color:black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </li>

                    @endif
                @else
                    {{-- GUEST VIEW --}}
                    <li class="nav-item mx-2">
                        <a style="font-family: Quicksand; color:white" class="nav-link" href="{{route('home')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            Home
                        </a>
                    </li>
                    <a class="nav-link  mx-2" href="{{ route('login') }}" style="font-family: Quicksand; color:white">Login</a>
                    <a class="nav-link  mx-2" href="{{ route('register') }}" style=" font-family: Quicksand; color:white">Register</a>
                @endauth

            </div>
          </div>
        </div>
      </nav>

    <div class="container-fluid p-3 mb-5">
            @yield('content')
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
  </body>

    <footer>
        <div class="container-fluid py-2 bg-dark justify-content-center d-flex" style="bottom:0; position:fixed; z-index:4">
            <div class="text-center" style="width: 100vw;">
                <div class="row my-2">
                    <div class="col-md-3">
                        <p class="text-start my-auto" style="color: white; font-family: 'Quicksand';"><strong> Date and Time:</strong> {{ now()->toDayDateTimeString() }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-center fw-lighter m-0" style="color: white; font-family: 'Quicksand';" >Copyright © QuickTask {{date('Y')}}</p>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>
