@extends('__partials.admin.__layout')
@section('title') Applications @endSection
@section('page-title') Applications @endSection

@section('page-content')
<div class="container my-3">
<p class="text-muted p-2">This page is used to  all applications in the system.</p>
    <div class="table-responsive">
         <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></th>
                    <th class="text-muted fw-bold">No.</th>
                    <th class="text-muted fw-bold">Date Applied</th>
                    <th class="text-muted fw-bold">Email</th>
                    <th class="text-muted fw-bold">Phone Number</th>
                    <th class="text-muted fw-bold">School</th>
                    <th class="text-muted fw-bold">Status</th>
                    <th class="text-muted fw-bold">Action</th>
                </thead>
                <tbody id="table-body-section">
                    
                </tbody>
            </table>
    </div>
</div>

@endSection