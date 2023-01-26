@extends('__partials.admin.__layout')
@section('title') Dashboard @endSection
@section('page-title') APPLICATION FORM @endSection

@section('page-content')

@php

    $phoneNumbers = json_decode($school->phone_numbers);

@endphp


<div class="container card rounded-0 p-3">
    <div class="card-body border p-3" id="form-body">
        <h6 class="fw-bold">No. 00712</h6>
        <div class="d-flex m-3 border-bottom p-3 align-items-start ">
            <div class="col-sm-1">
                <img src="/storage/{{$school->barge_image}}" class="img ms-3"  width="60"/>
            </div>
            <div class="col-sm-6 text-center">
                <h4 class="fw-bolder">{{Str::upper($school->name)}}</h4>
            </div>
            <div class="col-sm-5 text-end text-muted">
                <p class="my-0 p-0">P.O Box {{$school->postal_code}},</p>
                <p class="my-0 p-0">TEL {{ implode(', ',$phoneNumbers) }}</p>
                <p class="my-0 p-0">Email <span class="text-info">{{$school->email}}</span></p>
            </div>
        </div>
        <p class="text-center">APPLICATION FORM</p>

        
        <div class="mt-5 py-3"></div>

        @foreach($sections as $section)


            <div class="d-flex justify-content-between align-items-start  mb-0 text-dark p-0">
                        <h5 class="card-title text-capitalize text-dark fw-bold">{{$section->title }}.</h5>
                        

                        <form action="{{route('sections.destroy',$section->id)}}" method="POST" class=" d-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-target="#section" class="btn  btn-sm btn-danger  ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square align-middle me-2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                            </svg>
                        </button>
                        <a data-target="#sectionEdit" class="btn  btn-sm btn-info  mx-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </a>

                        </form>
            </div>



            @foreach($questions as $question)

            @if($question->form_section == $section->id)
                    <div class="d-flex justify-content-between align-items-start  mb-0 text-dark p-0">
                        <div class="d-flex ">
                            <div class="me-3">{{$question->numbering}}.</div>
                            <p class="text-dark">{{$question->question}}</p>
                        </div>
                        <form action="{{route('questions.destroy',$question->id)}}" method="POST" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-target="#question" class="btn  btn-sm btn-danger mx-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square align-middle me-2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                            </svg>
                        </button>

                        </form>
                    

                    </div>

                    @if($question->question_type == 'open-ended')
                    <form id="form-{{$question->id}}" action="{{route('questions.update' , $question->id)}}" method="post" class="d-flex">
                        @csrf
                        @method('PUT')
                        <select name="value_type" class="form-control form-control-sm rounded-0 input-type"  data-target="#form-{{$question->id}}" >
                            <option selected value="{{$question->value_type}}">{{Str::ucfirst(Str::lower($question->value_type))}}</option>
                            <option  value="TEXT">Text</option>
                            <option value="DATE">Date</option>
                            <option value="PDF">Pdf</option>
                            <option value="IMAGE">Image</option>
                            <option value="TEXTAREA">Large Text</option>
                            <option value="COUNTRIES">Countries</option>
                        </select>
                    </form>
                    @elseif($question->question_type == 'closed-ended')
                    @php

                    $options = json_decode($question->answers);

                    @endphp

                    <form id="form-{{$question->id}}" action="{{route('questions.update' , $question->id)}}" method="post" class="d-flex">
                        @csrf
                        @method('PUT')
                        <select name="value_type" class="form-control form-control-sm rounded-0 input-type"  data-target="#form-{{$question->id}}" >
                            <option selected value="{{$question->value_type}}">{{Str::ucfirst(Str::lower($question->value_type))}}</option>
                            <option  value="TEXT">Text</option>
                            <option value="RADIO">Radio Option</option>
                            <option value="SELECT">Select Box</option>
                        </select>
                    </form>

                    @elseif($question->question_type == 'closed-ended')

                    <form id="form-{{$question->id}}" action="{{route('questions.update' , $question->id)}}" method="post" class="d-flex">
                        @csrf
                        @method('PUT')
                        <select name="value_type" class="form-control form-control-sm rounded-0 input-type"  data-target="#form-{{$question->id}}" >
                            <option selected value="{{$question->value_type}}">Check List</option>
                            <option  value="TEXT">Check List</option>
                        
                        </select>
                    </form>

                    @endif
                @endif

                @endforeach



        @endforeach




    </div>
</div>
<form action="{{route('sections.store')}}" class="container p-3" method="POST" >
    @csrf
    <h4>Add Form Section </h4>
    <div class="form-group mb-3">
        <label for="">Ordering</label>
        <input type="number" min="1" class="form-control" name="ordering" placeholder="Order" required />
        @error('ordering')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    <div class="form-group mb-3">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Section Title" required />
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    <input type="hidden" name="school_id" value="{{$school->id}}" class="d-none">

    <div class="form-group mb-3">
        <label for="">Description</label>
        <textarea name="description" class="form-control rounded" placeholder="Description" cols="30" rows="2"></textarea>
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    
    <button type="submit" id="sub" class="btn  btn-warning rounded-0">Add Section</button>


</form>
<form action="{{ route('questions.store') }}" method="post" class="container p-3" id="field-form">
    <h4>Add Questions</h4>
    @csrf
    <p class="text-muted my-2">This form is used to add questions on the application form.</p>
    <div class="form-group mb-3">
        <label for="">Section</label>
        <select name="form_section" class="form-select form-control" id="">
            <option selected value="">None</option>
            @foreach($sections as $section)
            <option value="{{$section->id}}">{{$section->title}}</option>
            @endforeach

        </select>
        @error('form_section')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    <div class="form-group mb-3">
        <label for="">Numbering</label>
        <input type="text" class="form-control" name="numbering" placeholder="Numbering" required />
        @error('numbering')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    <div class="form-group mb-3">
        <label for="">Question</label>
        <textarea name="question" class="form-control rounded" id="" cols="30" rows="2"></textarea>
        @error('question')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>


    <div class="form-group mb-3">
        <label for="">Question Type</label>
        <select name="question_type" class="form-select form-control" id="q-type">
            <option selected value="open-ended">Open Ended</option>
            <option value="closed-ended">Closed Ended</option>
            <option value="multiple-choice">Multiple Choices</option>
        </select>
        @error('question_type')
        <span class="text-danger">{{$message}}</span>
        @endError
    </div>
    <input type="hidden" name="school_id" value="{{$school->id}}" class="d-none">
    <div id="closed-ended" class="d-none">
        <div class="d-flex justify-content-between my-2">
            <h4>Answers</h4>
            <button type="button" class="btn btn-sm btn-secondary text-capitalize" id="add-answer-closed-ended">Add Answer</button>
        </div>
        <div class="row mb-2" id="option-1">
            <div class="col-md-6 col-sm-6 col-xl-6">
                <input type="text" class="form-control opt" name="options[]" placeholder="Answer" />
            </div>
            <div class="col-sm-1 col-md-1 col-1">
                <button type="button" data-target="#option-1" class="btn delete-closed-option  btn-sm btn-danger mx-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square align-middle me-2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                    </svg>
                </button>
            </div>
        </div>
        <div class="row mb-2" id="option-2">
            <div class="col-md-6 col-sm-6 col-xl-6">
                <input type="text" class="form-control opt" name="options[]" placeholder="Answer" />
            </div>
            <div class="col-sm-1 col-md-1 col-1">
                <button type="button" data-target="#option-2" class="btn delete-closed-option  btn-sm btn-danger mx-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square align-middle me-2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                    </svg>
                </button>
            </div>
        </div>


    </div>

    <div class="row justify-content-end mt-3">
        <div class="col-md-2 col-sm-3">
            <button type="submit" id="sub" class="btn  btn-warning rounded-0">Add Question</button>
        </div>
    </div>
</form>

@endSection

@push('scripts')

<script>
    $(document).ready(function() {
        var closed_ended_options = 2;
        $(".delete-closed-option").on('click', function(e) {
            let row_id = $(this).attr('data-target')
            $("" + row_id).remove()
            //  alert(row_id);
        })

        $("#add-answer-closed-ended").on('click', function(event) {
            closed_ended_options += 1
            let i = closed_ended_options
            let template = `
                <div class="row mb-2 align-items-center" id="option-${i}">
                    <div class="col-md-6 col-sm-6 col-xl-6">
                        <input type="text" class="form-control" name="options[]" placeholder="Answer" />
                    </div>
                    <div class="col-sm-1 col-md-1 col-1">
                        <button type="button" data-target="#option-${i}" class="btn delete-closed-option  btn-sm btn-danger mx-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square align-middle me-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        </button>
                    </div>         
                </div>`
            $("#closed-ended").append(template)
            $(".delete-closed-option").on('click', function(e) {
                let row_id = $(this).attr('data-target')
                $(row_id).remove()
                // alert(row_id);
            })

        });


        $("#q-type").on('change', function(e) {
            if ($(this).val() == 'closed-ended' || $(this).val() == 'multiple-choice') {
                $("#closed-ended").removeClass('d-none')
            } else {
                $("#closed-ended").addClass('d-none')

            }
        })

        $(".input-type").on('change',function(){
            let form = $(this).attr('data-target')
            $(form).submit();
        })


    })
</script>
@endPush