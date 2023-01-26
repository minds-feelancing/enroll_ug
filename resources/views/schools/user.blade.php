@extends('__partials.admin.__layout')
@section('title') Activity Logs @endSection
@section('page-title') {{ $school->name}} @endSection

@section('page-content')

<div class="container my-3">
    <h4>Activity Logs</h4>
<div class="d-flex justify-content-between  align-items-end mb-3">
<p class="text-muted p-2">This page shows the activity logs of <span class="fw-bold"> {{ $user->firstName }}  {{ $user->lastName}}</span> .</p>
            <a href="{{route('staff.index',$school->id)}}" class="btn btn-warning rounded-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle align-middle me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg>
            Back</a>

        </div>
    <div class="table-responsive">
         <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th class="text-muted fw-bold">Timestamp</th>
                    <th class="text-muted fw-bold">Activity</th>
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