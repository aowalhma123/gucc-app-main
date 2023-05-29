<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <title>GUCC</title>
</head>
<body>
<header>
    <nav class="nav-deco">
        <a href="{{route('frontend')}}">
            <img src="{{ asset('frontend/images/logo.png') }}">
        </a>
        <div class="nav-links" id="navLinks">
            <ul><li><a href="{{route('frontend')}}">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Gucc</a></li>
                <li><a href="{{route('tutorial-program')}}">Programming tutorials</a>
                <li><a href="{{route('cv-list')}}">Portfolio List</a></li>
                <li><a href="{{route('portfolio')}}">Drop-Portfolio</a></li>
                @if(Auth::check())
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @else
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif
                <li><a href="">Contact</a></li>
            </ul></div>
    </nav>
</header>

<section>
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 border border-warning">
                <h2 class="text-center my-5">Front End CV</h2>
                <div class="row text-center">
                    @foreach($frontend_cv as $frontend)
                    <div class="col col-lg-4 mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$frontend->id}}">
                            <h5>{{$frontend->users['name']}}-Resume</h5>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_{{$frontend->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">CV</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{$frontend->cv}}" width="450" height="500" type="application/pdf" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col col-lg-6 border border-warning">
                <h2 class="text-center my-5">Back-end CV</h2>
                <div class="row text-center">
                    @foreach($backend_cv as $backend)
                    <div class="col col-lg-4 mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$backend->id}}">
                            <h5>{{$backend->users['name']}}-Resume</h5>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_{{$backend->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">CV</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{$backend->cv}}" width="450" height="500" type="application/pdf" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
