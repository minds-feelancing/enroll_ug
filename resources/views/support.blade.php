@extends('__partials.admin.__layout')
@section('title') Support @endSection
@section('page-title') Support @endSection

@section('page-content')

<div class="container my-3">
<p class="text-muted p-2">This is  page contains all the active issues raised by the customers and schools.</p>

<h4>Tickets</h4>
    <div class="table-responsive">
         <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></th>
                    <th class="text-muted fw-bold">No.</th>
                    <th class="text-muted fw-bold">Issue Title</th>
                    <th class="text-muted fw-bold">User Type</th>
                    <th class="text-muted fw-bold">Reported At</th>
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