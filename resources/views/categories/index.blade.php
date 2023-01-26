@extends('__partials.admin.__layout')
@section('title') School Categories @endSection
@section('page-title') School Categories @endSection

@section('page-content')

<div class="row">
    <div class="col-12 col-md-8 col-lg-12 container p-2">
        <div class="d-flex justify-content-between  align-items-end mb-3">
              <p class="text-muted p-2">This page is used to add school categories in the system.</p>
              <a href="{{route('categories.create')}}" class="btn btn-warning rounded-0" >Add Category</a>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-hover text-center align-items-center">
                <thead class="bg-light">
                    <th class="text-muted fw-bold">No.</th>
                    <th class="text-muted fw-bold">Name</th>
                    <th class="text-muted fw-bold">Action</th>
                </thead>
                <tbody id="table-body-section">
                    
                </tbody>
            </table>
        </div>        
    </div>
</div>





@endSection

@push('scripts')

<script>
   $(document).ready(function(){

    var table = $("#table-body-section")
    

        $.ajax({
            method:'GET',
            url:'{{route("api.categories.index")}}',
            success:function(data,textStatus,jqxhr){
                console.log(data)
                if(data.data.length){
                    table.fadeOut(200)
                    table.empty();
                    data.data.forEach((item,$index) => {
                        let t = moment(item.created_at,'d MM YYYY')
                        console.log(t.format('D'))
                        table.append(`
                        <tr>
                            <td>${$index+1}</td>
                            <td>${item.name}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                  
                                    <a href="/categories/${item.id}/edit" class="btn btn-sm btn-info mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>  
                                    edit                                      
                                    </a>
                                    <a href="/categories/${item.id}" class="btn btn-sm btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>   
                                    delete                                     
                                    </a>
                                </div>
                            </td>
                        </tr>`)
                    })
                    table.fadeIn(300)
                }
            





            }
        })

    

    
   })
</script>
  
@endpush
