@extends('__partials.admin.__layout')
@section('title') Settings @endSection
@section('page-title') Settings @endSection

@section('page-content')

<div class="row">
    <div class="col-12 col-md-8 col-lg-12 container p-2">

        <ul>
            <li><a href="{{route('categories.index')}}">Categories</a></li>
        </ul>
        
    </div>
</div>



@endSection