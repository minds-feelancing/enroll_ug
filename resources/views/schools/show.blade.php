@extends('__partials.admin.__layout')
@section('title') Schools @endSection
@section('page-title') {{$school->name}} @endSection

@section('page-content')

<div class="d-flex row ">
    <div class="col-sm-3 card">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Collections</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <h1 class="mt-1 mb-3">0.00 UGX</h1>
        </div>
    </div>
    <div class="col-sm-3 mx-2 card ">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Applications</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
            <h1 class="mt-1 mb-3">0</h1>
        </div>
    </div>
    <div class="col-sm-4 card ">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Visits</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
            <h1 class="mt-1 mb-3">0</h1>
        </div>
    </div>
</div>
<div class="row my-2">
    <a href="{{ route('schools.form',$school->id) }}" class="btn btn-primary rounded-0 col-sm-3 col-md-3 col-xl-2 me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text align-middle me-2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        Application Form
    </a>
    <a href="" class="btn btn-success rounded-0 col-sm-3 col-md-3 col-xl-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up align-middle me-2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            Transfer Funds
    </a>
    <a href="{{route('staff.index',$school->id)}}" class="btn btn-info rounded-0 col-sm-3 col-md-3 col-xl-2 mx-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle me-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> 
     School staff
    </a>
</div>
<div class="container my-3">
    <h4>Applications</h4>
    <div class="table-responsive">
         <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></th>
                    <th class="text-muted fw-bold">No.</th>
                    <th class="text-muted fw-bold">Date Applied</th>
                    <th class="text-muted fw-bold">Email</th>
                    <th class="text-muted fw-bold">Phone Number</th>
                    <th class="text-muted fw-bold">Status</th>
                    <th class="text-muted fw-bold">Action</th>
                </thead>
                <tbody id="table-body-section">
                    
                </tbody>
            </table>
            <nav aria-label="Page navigation example pt-3">
        <ul class="pagination justify-content-center"  id="pagination-list">
          
            
           
        </ul>
        </nav>
    </div>
</div>


@endSection