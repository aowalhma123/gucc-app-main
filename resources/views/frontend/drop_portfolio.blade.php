<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width="device-width,initial-scale=1.0">
    <title>Design and development of an website for managing students of GUB</title>
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/9e33c082de.js" crossorigin="anonymous"></script>
</head>
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
<body>
<form action="{{route('upload-cv')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="d-flex justify-content-center align-items-center">
        <div class="w-50 mb-5 port-continer">
            <h3 class="font-weight-bold mt-5 mb-4">Select Subject</h3>
            <select class="form-select" name="type" aria-label=".form-select-lg example">
                <option selected>Open this select menu</option>
                <option value="1">Frontend</option>
                <option value="2">Backend</option>
            </select>
            <div class="mb-5">
                <label for="formFileMultiple" class="form-label text-dark mt-4">Drop Your Protfolio</label>
                <input class="form-control" type="file" name="upload_file" id="formFileMultiple" multiple>
            </div>
            <div class="d-flex justify-content-center align-center">
                <button name="submit" type="submit" class="btn btn-outline-dark mx-auto w-50 fw-bold">Submit</button>
            </div>
        </div>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
