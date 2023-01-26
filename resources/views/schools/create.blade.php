@extends('__partials.admin.__layout')
@section('title') Schools @endSection
@section('page-title') Add Schools @endSection

@section('page-content')

<div class="row">
    <div class="col-12 col-md-8 col-lg-12 container p-2">
        <div class="d-flex justify-content-between  align-items-end mb-3">
            <p class="text-muted p-2">This page is used to add a school in the system.</p>
            <a href="{{route('categories.index')}}" class="btn btn-warning rounded-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>View Schools</a>

        </div>
        <form action="{{route('schools.store')}}" method="post"   enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="SchoolName">School Name</label>
                <input type="text" class="form-control rounded-0" placeholder="School Name" required value="{{old('name')}}"  name="name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="SchoolEmail">Email</label>
                <input type="email" class="form-control rounded-0" placeholder="School Email"  value="{{old('email')}}"  name="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="SchoolName">Website URL</label>
                <input type="url" class="form-control rounded-0" value="{{old('website')}}"  placeholder="https://myshool.example.co.ug" name="website">
                @error('website')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="form-group mb-3">
                <label for="Ownership">Ownership</label>
                <select name="ownership" id="" class="form-control dorm-select rounded-0">
                    <option value="">Choose ...</option>
                    <option value="PRIVATE">Private</option>
                    <option value="GOVERNMENT">Government</option>
                    <option value="INTERNATIONAL">International</option>
                </select>
                @error('ownership')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="categroy">Category</label>
                <select name="category_id" id="" class="form-control dorm-select rounded-0">
                    <option value="">Choose ...</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    
                </select>
                @error('category-id')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="row">
                <div class="form-group mb-3 col-md-6 col-xl-6 col-sm-6">
                    <label for="line1">Mobile No.</label>
                    <input type="text" class="form-control rounded-0" value="{{old('phone_number')}}"  placeholder="Line 1" name="phone_number[]">
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

                <div class="form-group mb-3 col-md-6 col-xl-6 col-sm-6">
                    <label for="line2">Mobile No.</label>
                    <input type="text" class="form-control rounded-0" value="{{old('phone_number')}}"  placeholder="Line 2" name="phone_number[]">
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>



            </div>

       


            <h4>Location</h4>

            <div class="form-group mb-3">
                <label for="address">School Address</label>
                <input type="text" class="form-control rounded-0"  value="{{old('address')}}"  placeholder="School Address" name="address">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="row">
                <div class="form-group mb-3 col-md-4 col-xl-4 col-sm-4">
                    <label for="district">District</label>
                    <input type="text" class="form-control rounded-0"   value="{{old('district')}}" placeholder="District" name="district">
                    @error('district')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

                <div class="form-group mb-3 col-md-4 col-xl-4 col-sm-4">
                    <label for="region">Region</label>
                    <select name="region" id="" class="form-control dorm-select rounded-0">
                    <option value="">Choose ...</option>
                    <option value="Northern">Northern</option>
                    <option value="Central">Central</option>
                    <option value="Eastern">Eastern</option>
                    <option value="Western">Western</option>
                    <option value="WestNile">WestNile</option>
                </select>
                    @error('region')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

                <div class="form-group mb-3 col-md-4 col-xl-4 col-sm-4">
                    <label for="postal">P.o Box</label>
                    <input type="text" class="form-control rounded-0" placeholder="P.O Box" name="postal_code">
                    @error('postal_code')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

            </div>
            <h5>GPS Co-ordinates</h5>
            <div class="row mb-3">
                <div class="form-group mb-3 col-md-6 col-xl-6 col-sm-6">
                    <label for="latitude">Latitude.</label>
                    <input type="number" class="form-control rounded-0"  value="{{ old('latitude')}}" placeholder="Latitude" name="latitude">
                    @error('latitude')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

                <div class="form-group mb-3 col-md-6 col-xl-6 col-sm-6">
                    <label for="longitude">.</label>
                    <input type="text" class="form-control rounded-0" value="{{ old('longitude')}}" placeholder="Longitude" name="longitude">
                    @error('longitude')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>

            </div>

            <h4 class="mb-3">Discography</h4>
            <div class="row mb-3 justify-content-between align-items-start">
                <div class="form-group col-md-4 col-xl-4">
                    <label for="barge">School Barge / Logo</label>
                    <input type="file" name="barge" class="form-control" id="barge">
                    @error('barge')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>
                <div class="form-group col-md-6 col-xl-6 border p-2" id="barge_preview">
                    <p class="text-muted text-center p-4">Barge Preview</p>
                </div>
            </div>

            <div class="row mb-3 justify-content-between align-items-start">
                <div class="form-group col-md-4 col-xl-4">
                    <label for="barge">Main Banner</label>
                    <input type="file" name="main_banner" class="form-control" id="main_banner">
                    @error('main_banner')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>
                <div class="form-group col-md-6 col-xl-6 border p-2" id="main_banner_preview">
                    <p class="text-muted text-center p-4">Preview</p>
                </div>
            </div>
            <div class="row mb-3 justify-content-between align-items-start">
                <div class="form-group col-md-4 col-xl-4">
                    <label for="barge">Secondary Banner</label>
                    <input type="file" name="secondary_banner" class="form-control" id="secondary_banner">
                    @error('secondary_banner')
                    <span class="text-danger">{{$message}}</span>
                    @endError
                </div>
                <div class="form-group col-md-6 col-xl-6 border p-2" id="secondary_banner_preview">
                    <p class="text-muted text-center p-4">Preview</p>
                </div>
            </div>

            <div class="form-group mb-3 col-md-4 col-xl-4 col-sm-4">
                    <label for="postal">Year Started</label>
                    <input type="number" class="form-control rounded-0"  value="{{old('year_started')}}" placeholder="1944" name="year_started">
                    @error('year_started')
                    <span class="text-danger">{{$message}}</span>
                    @endError
            </div>
            <div class="form-group mb-3">
                <label for="affiliation">Religious Affiliation</label>
                <select name="religious_affiliation" id="" class="form-control dorm-select rounded-0">
                    <option selected value="None">None</option>
                    <option value="CATHOLIC">Catholic</option>
                    <option value="PROTESTANT">Protestant</option>
                    <option value="MOSLEM">Islam</option>
                    <option value="ANGLICAN">Anglican</option>
                    <option value="ADVENTIST">ADVENTIST</option>                    
                </select>
                @error('religious_affiliation')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="form-group mb-3">
                <label for="mission">Mission</label>
                <textarea name="mission" class="form-control rounded-0" id="" cols="30" rows="4">{{ old('mission')}}</textarea>
                @error('mission')
                     <span class="text-danger">{{$message}}</span>
                @endError
            </div>
            <div class="form-group mb-3">
                <label for="vision">Vision</label>
                <textarea name="vision" class="form-control rounded-0" id="" cols="30" rows="4">{{ old('vision')}}</textarea>
                @error('vision')
                     <span class="text-danger">{{$message}}</span>
                @endError
            </div>

    
            <div class="form-group mb-3">
                <label for="background">Background</label>
                <textarea name="background" class="form-control rounded-0" id="" cols="30" rows="10">{{ old('background')}}</textarea>
                @error('Background')
                     <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <h4 class="mb-3">Financial Section</h4>

            <p class="text-muted">This information is going to be used durng transfer of funds from our wallet to the schools bank account </p>

            

            <div class="form-group mb-3">
                <label for="SchoolName">Bank name</label>
                <input type="text" class="form-control rounded-0" placeholder="Bank Name" required value="{{old('bank_name')}}"  name="bank_name"  required>
                @error('bank_name')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="form-group mb-3">
                <label for="SchoolName">Account Number</label>
                <input type="text" class="form-control rounded-0" placeholder="Account Number" required value="{{old('account_number')}}"  name="account_number"  required>
                @error('account_number')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <div class="form-group mb-3">
                <label for="SchoolName">Account Name</label>
                <input type="text" class="form-control rounded-0" placeholder="Account Name" required value="{{old('account_name')}}"  name="account_name"  required>
                @error('account_name')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <h4 class="mb-3">Application Fees</h4>

            <p class="text-muted">This is the amount which wil be transacted on the schools behalf and commission aggreed for the servsice </p>


            <div class="form-group mb-3">
                <label for="SchoolName">Application Cost</label>
                <input type="text" class="form-control rounded-0" placeholder="Application Cost" required value="{{old('application_fees')}}"  name="application_fees"  required>
                @error('application_fees')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>


            <div class="form-group mb-3">
                <label for="SchoolName">Commission</label>
                <input type="text" class="form-control rounded-0" placeholder="Commission" required value="{{old('commission')}}"  name="commission"  required>
                @error('commission')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>



            <div class="form-group mb-3">
                <label for="affiliation">Commission Method</label>
                <select name="commission_method" id="" class="form-control dorm-select rounded-0">
                    <option selected value="fixed">Fixed Amount</option>
                    <option value="percentage">Percentage</option>
                </select>
                @error('commission_method')
                <span class="text-danger">{{$message}}</span>
                @endError
            </div>

            <button type="submit" class="btn btn-warning rounded-0">Save</button>



        </form>
    </div>
</div>



@endSection


@push('scripts')
<script>
    

    $(document).ready(function(){

        watchPreview($("#barge"),$("#barge_preview"),150,150)
        watchPreview($("#main_banner"),$("#main_banner_preview"),"100%",250)
        watchPreview($("#secondary_banner"),$("#secondary_banner_preview"),"100%",250)


        function watchPreview(element,preview_element , width , height){
            element.on('change',function(e){
                preview_element.empty()
                let image = URL.createObjectURL(e.target.files[0])
                preview_element.append(`<img src="${image}"  class="img "  width="${width}" height="${height}" />`)
            })
        }
        


        
    })
</script>



@endPush