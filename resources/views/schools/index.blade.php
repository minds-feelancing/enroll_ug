@extends('__partials.admin.__layout')
@section('title') Schools @endSection
@section('page-title') Schools @endSection

@section('page-content')

<div class="row">
    <div class="col-12 col-md-8 col-lg-12 container p-2">
        <div class="d-flex justify-content-between  align-items-end mb-3">
              <p class="text-muted p-2">This page is used to view all schools in the system.</p>
              <a href="{{route('schools.create')}}" class="btn btn-warning rounded-0" >Add School</a>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover text-center ">
                <thead class="bg-light">
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></th>
                    <th class="text-muted fw-bold">Barge</th>
                    <th class="text-muted fw-bold">Name</th>
                    <th class="text-muted fw-bold">Email</th>
                    <th class="text-muted fw-bold">Mobile</th>
                    <th class="text-muted fw-bold">Address</th>
                    <th class="text-muted fw-bold">Region</th>
                    <th class="text-muted fw-bold">District</th>
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
</div>





@endSection

@push('scripts')

<script>
   $(document).ready(function(){

    var table = $("#table-body-section")
    var pagination =$("#pagination-list")
        $.ajax({
            method:'GET',
            url:'{{route("api.schools.index")}}',
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
                                <a href="schools/${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle me-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                </a>
                            </td>
                            <td><img src="/storage/${item.barge_image}" class="img"  width="60"  height="60" ></td>
                            <td>${item.name}</td>
                            <td>${item.email}</td>
                            <td>${JSON.parse(item.phone_numbers)[0]}</td>
                            <td>${item.address}</td>
                            <td>${item.region}</td>
                            <td>${item.district}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                  
                                    <a href="/schools/${item.id}/edit" class="btn btn-sm btn-info ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>  
                                    edit                                      
                                    </a>
                                    <a href="/schools/${item.id}" class="btn btn-sm btn-danger">
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
