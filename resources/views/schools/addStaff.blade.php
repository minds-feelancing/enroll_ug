@extends('__partials.admin.__layout')
@section('title') School Admins @endSection
@section('page-title') {{ $school->name }} @endSection

@section('page-content')

<div class="d-flex justify-content-between  align-items-end mb-3">
    <h4>Add User</h4>
            <a href="{{route('staff.index',$school->id)}}" class="btn btn-warning rounded-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle align-middle me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
            Back</a>

        </div>
<form action="{{ route('staff.store',$school->id) }}" method="POST" class=" col-xl-8 col-md-8">
@csrf
            <div class="form-group mb-3">
                <label for="SchoolName">First Name</label>
                <input type="text" class="form-control rounded-0" placeholder="First Name" required value="{{old('firstName')}}"  name="firstName">
                @error('firstName')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="SchoolName">Last Name</label>
                <input type="text" class="form-control rounded-0" placeholder="Last Name" required value="{{old('lastName')}}"  name="lastName">
                @error('lastName')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="SchoolName">Phone Number</label>
                <input type="text" class="form-control rounded-0" placeholder="+256 ....." required value="{{old('phone_number')}}"  name="phone_number">
                @error('phone_number')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="SchoolEmail">Email</label>
                <input type="email" class="form-control rounded-0" placeholder="Email"  value="{{old('email')}}"  name="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <p class="text-muted p-2">This default password is ways enroll123 for users of  {{ $school->name }}.</p>

          <button type="submit" id="sub" class="btn  btn-warning rounded-0">Add User</button>
      
</form>


@endSection