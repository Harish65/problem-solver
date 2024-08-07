@extends('adult.layouts.adult')
@section('title', 'Adult | Solution Types')
@section('content')
@php $showMessage = true @endphp
<div class='relationshipPage'>
    <div class="container">
        <div class="mainTitle">
            <div class="row">
                        <?php 
                            $parameters = ['problem_id'=> $problem_id , 'project_id' => $project_id];                            
                            $parameter =  Crypt::encrypt($parameters);
                        ?>
                    <a id="problem_nav" href="{{ route('adult.problem',@$parameter) }}"></a>
                    <a id="solution_nav" href="{{ route('adult.solution',@$parameter) }}"></a>
                    <a id="solution_fun_nav" href="{{ route('adult.solution-func',@$parameter) }}"></a>
                    <a id="verification" href="{{ route('adult.varification',@$parameter) }}"></a>

                    @include('adult.verification.view.component.verification_types')
            </div>
        </div>
    </div>

    <!-- Content Section Start -->
    <div class="relationshipContent">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>{{ @$verificationType->page_main_title }}</h1>
                    <div class="relationImage text-center">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <div class="imgWrp carousel-inner" role="listbox">

                                <div class="carousel-item active">
                                    <img src="{{ asset('assets-new/verification_types/problem_at_location/slide_one.png')}}" alt="Chania"
                                        width="100%">
                                </div>
                                <div class="carousel-item ">
                                    <img src="{{ asset('assets-new/verification_types/problem_at_location/slide_two.png')}}" alt="Chania"
                                        width="100%">
                                </div>
                            </div>
                            <ol class="carousel-indicators custom">
                                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                
                            </ol>
                        </div>

                    </div>
                    <p>{{ @$verificationType->explanation }}</p>
                    
                </div>
                <!-- start -->
                @if($problrmAtLocatios)
                <div class="principleRelation">
                    <!-- Start -->
                    
                    
                    <div class="conditionBlock justify-content-center">
                        <div class="blockProblem">
                            <div class="projectBlock text-center">
                                <h2>Solution Function</h2>
                                <div class="projectList text-center">
                                    <div class="imgWrp">
                                        <img class="mx-auto"
                                            src=" {{ asset('assets-new/solFunction/'.$Solution_function->file)}}" width="100%"
                                            height="128px">
                                    </div>
                                    <p class="redText" style="color:#00A14C">{{ $Solution_function->name }}</p>
                                </div>
                                <div class="projectList">
                                    <p class="date">{{ date('d/m/Y', strtotime($Solution_function->created_at))}}</p>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="long-arrow">            
                            <p>of</p>
                            <img src="{{ asset('assets-new/images/arrowRight.png')}}">
                        <!-- add arrow Image over here -->
                      </div>
                        <div class="blockProblem">
                            <div class="projectBlock text-center">
                                <h2>Problem</h2>
                                <div class="projectList text-center">
                                    <div class="imgWrp">
                                        @if($problem->problem_type == 0)
                                            @if(strlen($problem->problem_file) < 15) <img class="mx-auto " src="{{ asset('assets-new/problem/'.$problem->file) }}" width="100%" height="128px">
                                            @endif
                                            @elseif($problem->problem_type == 1)
                                            <video class="mx-auto" controls="controls" preload="metadata" width="300"
                                                height="320" preload="metadata">
                                                <source
                                                    src="{{ asset('assets-new/problem/' . $problem -> problem_file) }}#t=0.1"
                                                    type="video/mp4">
                                            </video>
                                            @elseif($problem -> problem_type == 2)
                                            <iframe class="mx-auto" src="{{ $problem->problem_file }}" width="300"
                                                height="320"> </iframe>
                                            @endif
                                    </div>
                                    <p class="redText">{{ $problem->name }}</p>
                                </div>
                                <div class="projectList">
                                    <p class="date">{{ date('d/m/Y' , strtotime($problem->created_at))}}</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="long-arrow">            
                            <p>Executed at</p>
                            <img src="{{ asset('assets-new/images/arrowRight.png')}}">
                        <!-- add arrow Image over here -->
                      </div>
                      <div class="blockProblem">
                        <div class="projectBlock text-center">
                          <h2>Problem At Location</h2>
                          <div class="projectList text-center"> 
                          <div class="imgWrp">
                            @if($problrmAtLocatios -> type == 0)
                                        @if(strlen($problrmAtLocatios -> file) < 15)
                                            <img class="mx-auto" src="{{ asset('assets-new/verification_types/problem_at_location/'.$problrmAtLocatios->file) }}" width="100%" height="128px">
                                        @endif
                                        @elseif($problrmAtLocatios -> type == 1)
                                        <video class="mx-auto" controls="controls" preload="metadata" width="100%" height="128px" preload="metadata">
                                            <source src="{{ asset('assets-new/verification_types/problem_at_location/'.$problrmAtLocatios->file) }}#t=0.1" type="video/mp4">
                                        </video>
                                        @elseif($problrmAtLocatios -> type == 2)
                                            <iframe class="mx-auto" src="{{ $problrmAtLocatios->file }}" width="100%" height="128px"> </iframe>
                                        @endif 
                          </div>
                          <p class="redText">	&nbsp;	&nbsp;</p>
                          </div>
                          <div class="projectList">
                            <p class="date">{{ date('d/m/Y' , strtotime($problrmAtLocatios->created_at)) }}</p>
                            
                          </div>
                        </div>
                      </div>
                              
                    </div>
                    
                    <!-- End  conditionBlock-solution-->
                    <div class="questionWrap">
                        <h2>Validation Question</h2>
                        <br>
                        <form id="validation_form">
                        <input type="hidden" name="id" value="{{ @$verification->id }}"> 
                            <input type="hidden" name="verification_type_id" value="{{ @$verificationType->id }}"> 
                            <input type="hidden" name="problem_id" id="problem_id" value="{{ $problem_id }}">
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <input type="hidden" name="solution_id" id="solution_id" value="{{ $solution_id }}">
                            <input type="hidden" name="solution_fun_id" id="solution_fun_id" value="{{ $Solution_function->id }}">
                            <input type="hidden" name="name" id="name_" value="problem_at_location">
                            <h5>Is the problem solved at the location it is identified?</h5>
                            <ul class="validate_que" style="list-style:none;">

                                <li><label>&nbsp;&nbsp;<input type="radio" name="validation_1" {{
                                            (@$verification->validations->validation_1 == 1) ? 'checked' : '' }}
                                        value="1">&nbsp;&nbsp;Yes, the problem is solved at the location it is identified</label></li>
                                <li><label>&nbsp;&nbsp;<input type="radio" name="validation_1" {{
                                            (@$verification->validations->validation_1 == 2) ? 'checked' : '' }}
                                        value="2">&nbsp;&nbsp;No, the problem is not solved at the location it is identified</label>
                                </li>
                            </ul>

                            <h5>Does the solution function of the problem execute at the problem location?</h5>
                            <ul class="validate_que" style="list-style:none;">

                                <li><label>&nbsp;&nbsp;<input type="radio" name="validation_2" {{
                                            (@$verification->validations->validation_2 == 1) ? 'checked' : '' }}
                                        value="1">&nbsp;&nbsp;Yes, the solution function of the problem executes at the problem’s location</label>
                                </li>
                                <li><label>&nbsp;&nbsp;<input type="radio" name="validation_2" {{
                                            (@$verification->validations->validation_2 == 2) ? 'checked' : '' }}
                                        value="2">&nbsp;&nbsp;No, the solution function of the problem is not executed at the problem’s location</label></li>

                            </ul>
                            <button type="button" class="btn btn-success" id="saveValidations">Save Validations</button>
                        </form>

                    </div>
                </div>
                <!-- End -->
                @else
                <div class="col-sm-4">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#problem_at_location_modal" id="">+ Identify</button>
                    </div>
                @endif                    
            </div>
        </div>
    </div>
    <!-- Content Section End -->
    
</div>
<!----Model Start-->
<div class="modal fade" id="problem_at_location_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Problem and Solution at Location Explanation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="problem_at_location_modal_form">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="project_id" value="{{ $project_id }}">
            <input type="hidden" name="problem_id" id="problem_id" value="{{ $problem_id }}">   
            <input type="hidden" name="solution_id" id="solution_id" value="{{ $solution_id }}">
           
            <div class="form-group" id="upload_file">
                <label for="compensator">Upload File</label>
                <input type="file" name="file" data-height="150" id="file" class="dropify" accept="image/*, video/*">
            </div>
            <div class="form-group">
                <label for="compensator">Problem</label>
               <input type="text" class="form-control" value="{{ $problem->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="feedback">Solution Function</label>
                <input type="text" class="form-control" value="{{ $Solution_function->name}}" disabled>
            </div>
          </form>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="btnSave">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!--Model End-->
  
@endsection
@section('css')


<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<style>
    .carousel-indicators {
        position: relative;
    }
    .long-arrow p{
        position: relative;
        top:40px;
        left:45px;
    }
</style>
@endsection
@section('scripts')
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<script>

    $('#verification_types').on('change', function () {
        var id = $(this).val();
        window.location.href = "{{ route("adult.varification",@$parameter) }}" + '/' + id;
    })
    $('.dropify').dropify();
</script>
<script>
    $('.nav-problem').click(function () {
        $(this).attr('href', '');
        localStorage.setItem("selected_problem", $('#problem_nav').attr('href'));
        $(this).attr('href', $('#problem_nav').attr('href'))
    })
    $('.nav-solution').click(function () {
        $(this).attr('href', '');
        localStorage.setItem("sol", $('#solution_nav').attr('href'));
        $(this).attr('href', $('#solution_nav').attr('href'))
    })
    $('.nav-solution-func').click(function () {
        $(this).attr('href', '');
        localStorage.setItem("sol-fun", $('#solution_fun_nav').attr('href'));
        $(this).attr('href', $('#solution_fun_nav').attr('href'))
    })
    $('.verification').click(function () {
        $(this).attr('href', '');
        localStorage.setItem("varification", $('#verification').attr('href'));
        $(this).attr('href', $('#verification').attr('href'))
    })


    $('.dashboard').click(function () {
        //Solution
        $('.nav-solution').attr('href', '');
        localStorage.setItem("sol", $('#solution_nav').attr('href'));
        $('.nav-solution').attr('href', $('#solution_nav').attr('href'))
        //Problem
        $('.nav-problem').attr('href', '');
        localStorage.setItem("selected_problem", $('#problem_nav').attr('href'));
        $('.nav-problem').attr('href', $('#problem_nav').attr('href'))
        //Sol fun
        $('.nav-solution-func').attr('href', '');
        localStorage.setItem("sol-fun", $('#solution_fun_nav').attr('href'));
        $('.nav-solution-func').attr('href', $('#solution_fun_nav').attr('href'))
        //verification
        $('.nav-varification').attr('href', '');
        localStorage.setItem("varification", $('#verification').attr('href'));
        $('.nav-varification').attr('href', $('#solution_fun_nav').attr('href'))

    })

    $('.validation').on('change', function () {
        var problem = $(this).attr('data-id');
        var validation = $(this).val();
        var name = $(this).attr('name')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('adult.sol-validation')}}",
            data: { data: problem, value: validation, name: name },
            type: 'POST',
            success: function (response) {
                console.log(response)
            }

        })

    })


    

    $('.carousel').carousel({
        interval: 2000
    })

    // var showMessage = "{{$showMessage}}"
    // var text_ = 'The solution of a problem is located farther away from that problem.  In terms of time, we first identify the problem and then the solution of the problem.  We can look at the solution of a problem as our destination to solve that problem.  In terms of time, the problem is where we start and the solution is where we finish.  In order to show the relationship between the time we start and the time we finish, we must first identify the problem then the solution of the problem.  If the problem and the solution have not been identified, then there is no destination to solve that problem.  Please, refer to the problem page and the solution page to identify the problem and the solution in order to show the relationship that we start with problem and we finish with solution.'
    // if (showMessage) {
    //     swal({
    //         title: "Solution Time Location 1 ",
    //         text: text_,
    //         type: "Error",
    //         showCancelButton: true,
    //         confirmButtonColor: '#00A14C',
    //     });
    // }


    $(document).on('click', '#btnSave', function (e) {
        e.preventDefault();
        var fd = new FormData($('#problem_at_location_modal_form')[0]);
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('adult.probelm-at-location')}}",
            data: fd,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function () {
                $('#btnSave').attr('disabled', true);
                $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            },
            error: function (xhr, status, error) {
                $('#btnSave').attr('disabled', false);
                $('#btnSave').html('Submit');
                $.each(xhr.responseJSON.data, function (key, item) {
                    toastr.error(item);
                });
            },
            success: function (response) {
                if (response.success == false) {
                    $('#btnSave').attr('disabled', false);
                    $('#btnSave').html('Submit');
                    var errors = response.data;
                    $.each(errors, function (key, value) {
                        toastr.error(value)
                    });
                } else {

                    toastr.success(response.message);
                    location.reload()


                }
            }
        });
    });
    $('#solutio_functio_div').addClass('d-none');
    $('#solution_div').removeClass('d-none')
</script>
@endsection