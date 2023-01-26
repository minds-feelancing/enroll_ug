@extends('website.__base')


@section('content')

<main class="container w-100">

    <header class="__blue__background ">
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-3 shadow-sm fixed-top">
            <div class="container col-8">
                <a class="navbar-brand fw-bolder " href="{{ route('home') }}">Enroll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav nav justify-content-end align-items-end">
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vacancies
                            </a>
                            <ul class="dropdown-menu rounded-0 ">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="me-auto"></ul>
                    <ul class="navbar-nav nav justify-content-end align-items-end">
                        
                        <li class="nav-item">
                            <a class="nav-link  me-2" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning rounded-pill text-white " href="#"> <i class="bi bi-person"></i> Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container p-3 pt-5 mt-5">
            <p class="text-center text-light mt-4">it has never been easier.</p>
            <p class="display-4 text-white  fw-bolder text-center ">
                Find your next School!
            </p>
            <form class="my-2" action="#" method="post">
                <div class=" d-flex justify-content-center mb-3 align-items-center">
                    
                
                    <div class="form-group col-md-3 col-sm-3 bg-white border-0 d-flex align-items-center px-2">
                        <i class="bi bi-geo-alt text-muted"></i>
                        <input type="text"  class="form-control  border-0 form-control-lg rounded-0 p-2  __search__input" placeholder="Keywords...">
                    </div>
                    <div class="form-group col-md-3 col-sm-3">
                        <select name="" id="" class="form-control form-control-lg rounded-0 p-2">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2">
                        <select name="" id="" class="form-control form-control-lg rounded-0 p-2">
                            <option value="">All</option>
                            <option value="PRIVATE">Private</option>
                            <option value="GOVERNMENT">Government</option>
                            <option value="INTERNATIONAL">International</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center p-2">
                    <div class="col-md-4 col-sm-4 ">
                        <button type="submit" class="btn btn-warning rounded-pill text-center text-white w-100" > <i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <section class="section-two bg-light p-3">
        <h2 class="text-muted text-center fw-bold">Our Top Schools</h2>
        <div class="container bg-light">
            <div class="row p-2">
                @foreach($schools as $school)
                <div class="card col-md-4 col-sm-4 rounded-0">
                <img src="/storage/{{ $school->main_banner}}" class="card-img p-0 m-0 rounded-0" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-light">{{ $school->name}}</h5>
                </div>
                    <div class="card-body p-2">

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>


@endsection