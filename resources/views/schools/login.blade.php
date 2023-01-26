@extends('__partials.base')


@section('content')


<main class="d-flex w-100">
      <div class="container d-flex flex-column ">
        <div class="row vh-100">
          <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">
            <div class="text-center mt-4">
                <h1 class="h2">Enroll</h1>
                <p class="lead">Sign in to your schools dashboard</p>
              </div>
              <div class="card border   ">
                <div class="card-body">
                  <div class="m-sm-4">
                  <div class="text-center">
                      <img src="img/avatars/avatar.jpg" alt="Logo" class="img-fluid rounded-circle" width="132" height="132">
                    </div>
                    <form method="POST" action="{{route('school.authenticate')}}">
                    @csrf
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                          class="form-control rounded-0"
                          type="email"
                          name="email"
                          placeholder="Enter your email"
                        />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @endError
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                          class="form-control  rounded-0"
                          type="password"
                          name="password"
                          placeholder="Enter your password"
                        />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @endError
                        <small>
                          <a href="index.html">Forgot password?</a>
                        </small>
                      </div>
                      <div>
                       
                      </div>
                      <div class="text-center mt-3">
                    
                         <button type="submit" class="btn btn-lg btn-warning rounded-0"> Sign in</button> 
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>




@endSection