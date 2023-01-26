@extends('__partials.admin.__layout')
@section('title') Dashboard @endSection
@section('page-title') Dashboard @endSection

@section('page-content')

<div class="d-flex row ">
    <div class="col-sm-5 card">
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
    <div class="col-sm-5 mx-2 card ">
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