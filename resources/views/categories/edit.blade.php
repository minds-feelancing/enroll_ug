@extends('__partials.admin.__layout')
@section('title') School Categories @endSection
@section('page-title') School Categories @endSection

@section('page-content')

<div class="row">
    <div class="col-12 col-md-8 col-lg-12 container p-2">
        <div class="d-flex justify-content-between  align-items-end mb-3">
            <p class="text-muted p-2">This page is used to update school categories in the system.</p>
            <a href="{{route('categories.index')}}" class="btn btn-warning rounded-0" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>View Categories</a>

        </div>
        <form action="/categories/{{$category->id}}" method="post">

        
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm "  value="{{ $category->name }}" id="floatingInput"  name="name" placeholder="Category Name">
                        <label for="floatingInput">Category Name</label>
                    </div>
                    @error('name')
                        <span class="text-danger p-2">{{$message}}</span>
                    @endError
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-4 col-lg-6 col-sm-3">
                        <h5>Courses</h5>
                        <p class="text-muted">The category of institution is based on a course based program.</p>
                    </div>
                    <div class="col-md-4 col-lg-6 col-sm-3">
                        <select name="courses" class="form-control form-select" id="levels">
                            <option  <?=$category->courses==1??'selected' ?> value="1">Yes</option>
                            <option   <?=$category->courses==0??'selected' ?> value="0" >No</option>
                        </select>
                    </div>

                </div>

                <div class="row justify-content-between">
                <div class="col-md-4 col-lg-6 col-sm-3">
                    <h5>Levels</h5>
                    <p class="text-muted">The category of institution is based on a class or form or level based program.</p>
                </div>
                <div class="col-md-4 col-lg-6 col-sm-3">
                    <select name="levels" class="form-control form-select" id="levels">
                        <option <?=$category->levels==0??'selected' ?> value="1">Yes</option>
                        <option <?=$category->levels==0??'selected' ?> value="0" selected >No</option>
                    </select>
                </div>
                
            </div>

                <button type="submit" class="btn btn-warning rounded-0">Save</button>
            </div>

        </form>
    </div>
</div>



@endSection