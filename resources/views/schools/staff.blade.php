@extends('__partials.admin.__layout')
@section('title') School Admins @endSection
@section('page-title') {{ $school->name }} @endSection

@section('page-content')

<div class="container my-3">
    <div class="d-flex justify-content-between mb-2">
        <h4>Users</h4>
        <a href="{{route('staff.create',$school->id)}}" class="btn btn-warning rounded-0" > Add User</a>
    </div>
    <p class="text-muted p-2">This page shows all the users who can login on behalf or {{ $school->name }}.</p>
    <div class="table-responsive">
         <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></th>
                    <th class="text-muted fw-bold">First Name</th>
                    <th class="text-muted fw-bold">Last Name</th>
                    <th class="text-muted fw-bold">Email</th>
                    <th class="text-muted fw-bold">Phone Number</th>
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

@push('scripts')

<script>
   $(document).ready(function(){

    var table = $("#table-body-section")
    var pagination =$("#pagination-list")
        $.ajax({
            method:'GET',
            url:'{{route("api.staff.index",$school->id)}}',
            success:function(data,textStatus,jqxhr){
                console.log(data)
                if(data.data.length){
                    table.fadeOut(200)
                    table.empty();
                    data.data.forEach((item,$index) => {
                        let t = moment(item.created_at,'d MM YYYY')
                        console.log(t.format('D'))
                        table.append(`
                        <tr class="text-muted">
                            <td>
                                <a href="/schools/{{$school->id}}/staff/${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle me-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                </a>
                            </td>
                            <td>${item.firstName}</td>
                            <td>${item.lastName}</td>
                            <td>${item.email}</td>
                            <td>${item.phone_number}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                  
                                    
                                    <a href="schools/{{$school->id}}/staff/${item.id}" class="btn btn-sm btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>   
                                    delete                                     
                                    </a>
                                </div>
                            </td>
                        </tr>`)
                    })
                    table.fadeIn(300)

                    pagination.fadeOut()
                    pagination.empty()
                    data.links.forEach((item,i)=>{
                        pagination.append(
                            `<li class="page-item  ${item.active?'': 'disabled' } ">
                                <a href="${item.active?item.url: "#"}"   class="page-link" >${item.label}</a>    
                            </li>`
                        )
                    })

                    pagination.fadeIn()
                }
            





            }
        })

    

    
   })
</script>
  
@endpush
