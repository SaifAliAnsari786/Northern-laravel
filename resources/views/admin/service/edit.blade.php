@extends('admin.layouts.app')
@section('title')
<title>Edit Services</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper add-new-design">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}


        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="card-wrap form-block p-0">
                    <div class="block-header p-4">
                        <h3>Edit Services</h3>
                        <p class="ms-4 mb-0">Fill the following fields to add new services.</p>
                        <div class="tbl-buttons">
                            <ul>
                                <li>
                                    <a href="{{url('super-admin/service')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('success.success')
                    @include('errors.error')
                    <div class="row p-4 form-wrap">
                        {!! Form::open(['url' => 'super-admin/service/'.$service->id, 'class' => 'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group batch-form">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="form-group">
                                        <label for="logo">Logo <span class="text-danger">*</span></label>
                                        <input type="file" name="logo" class="form-control" id="logo" accept="image/png, image/jpeg" />
                                        <img src="{{ asset('images/services/'. $service->logo) }}" height="80" width="100">

                                    </div>



                                    <div class="form-group">
                                        <label for="background_image">Background Image <span class="text-danger">*</span></label>
                                        <input type="file" name="background_image" class="form-control" id="background_image" accept="image/png, image/jpeg" />
                                        <img src="{{ asset('images/services/'. $service->background_image) }}" height="80" width="100">

                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <label for="background_image_description">Background Image description<span style="color: red;">*</span></label>
                                        <textarea name="background_image_description" id="background_image_description" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $service->background_image_description !!}</textarea>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="title">Title </label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $service->title }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description">Description<span style="color: red;">*</span></label>
                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $service->description !!}</textarea>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="seo_title" class="form-label">Description Image Position</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio1" value="1" @if ($service->description_image_position==1) checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Right</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio2" value="2" @if ($service->description_image_position==2) checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">Left</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="seo_title" class="form-label">Form</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form" id="inlineRadio1" value="1" @if($service->form==1) checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form" id="inlineRadio2" value="2" @if($service->form==2) checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                   


                                </div>



                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_title" class="form-label">Seo Title</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title" value="{{$service->seo_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_description" class="form-label">Seo Description</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description" value="{{$service->seo_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="meta_keyword" name="meta_keyword" value="{{$service->meta_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="meta_keyword_description" class="form-label">Meta Keyword Description</label>
                                        <input class="form-control form-control-lg" type="text" id="meta_keyword_description" name="meta_keyword_description" value="{{$service->meta_keyword_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="service_description_title" class="form-label">Service Description Title</label>
                                        <input class="form-control form-control-lg" type="text" id="service_description_title" name="service_description_title" value="{{$service->service_description_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                        <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status</option>
                                            @foreach(config('custom.status') as $in2 => $val2)
                                            <option value="{{$in2}}" @if($service->status == $in2) selected @endif>{{$val2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4 submit-section">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                            <i class="fas fa-angle-double-right"></i></button>
                                        <a href="{{url('super-admin/service')}}">
                                            <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i class="fa-solid fa-angles-right"></i></button>
                                        </a>

                                    </div>

                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function removeImageDomOld(home_design_image_id) {
        debugger;
        if ($('.my-image').length > 1) {
            debugger;
            $.confirm({
                title: 'Do you sure want to delete?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function() {
                            // Get the value of the checked checkbox
                            var formData = new FormData();
                            formData.append('home_design_image_id', home_design_image_id);
                            start_loader();
                            //start ajax call
                            $.ajax({
                                /* the route pointing to the post function */
                                type: 'POST',
                                url: Laravel.url + "/super-admin/home-design-image-delete",
                                dataType: 'json',
                                data: formData,
                                processData: false, // tell jQuery not to process the data
                                contentType: false,
                                /* remind that 'data' is the response of the AjaxController */
                                success: function(data) {
                                    end_loader();
                                    debugger;
                                    $('#imageDomOld' + home_design_image_id).remove();
                                },
                                error: function(error) {
                                    end_loader();
                                    debugger;
                                }
                            });
                            //end ajax call
                        }
                    },
                    close: function() {}
                }
            });
        } else {
            errorDisplay('Please add at least one image!');
        }
    }




    function removeFeatureDom(id) {
        if ($('.my-feature-select').length > 1) {
            $('#featureDom' + id).remove();
        } else {
            errorDisplay('Please add at least one feature!');
        }
    }

    function removeFeatureDomOld(design_feature_id) {
        debugger;
        $.confirm({
            title: 'Do you sure want to delete?',
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function() {
                        // Get the value of the checked checkbox
                        var formData = new FormData();
                        formData.append('design_feature_id', design_feature_id);
                        start_loader();
                        //start ajax call
                        $.ajax({
                            /* the route pointing to the post function */
                            type: 'POST',
                            url: Laravel.url + "/super-admin/design-feature-delete",
                            dataType: 'json',
                            data: formData,
                            processData: false, // tell jQuery not to process the data
                            contentType: false,
                            /* remind that 'data' is the response of the AjaxController */
                            success: function(data) {
                                end_loader();
                                debugger;
                                $('#featureDomOld' + design_feature_id).remove();
                            },
                            error: function(error) {
                                end_loader();
                                debugger;
                            }
                        });
                        //end ajax call
                    }
                },
                close: function() {}
            }
        });

    }


    function removeDimensionDomOld(design_dimension_id) {
        debugger;
        $.confirm({
            title: 'Do you sure want to delete?',
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function() {
                        // Get the value of the checked checkbox
                        var formData = new FormData();
                        formData.append('design_dimension_id', design_dimension_id);
                        start_loader();
                        //start ajax call
                        $.ajax({
                            /* the route pointing to the post function */
                            type: 'POST',
                            url: Laravel.url + "/super-admin/design-dimension-delete",
                            dataType: 'json',
                            data: formData,
                            processData: false, // tell jQuery not to process the data
                            contentType: false,
                            /* remind that 'data' is the response of the AjaxController */
                            success: function(data) {
                                end_loader();
                                debugger;
                                $('#myDimensionOld' + design_dimension_id).remove();
                            },
                            error: function(error) {
                                end_loader();
                                debugger;
                            }
                        });
                        //end ajax call
                    }
                },
                close: function() {}
            }
        });

    }


    var myValidatedForm = true;

    function validateSlug(id) {
        debugger;
        var name = $('#design_title').val();
        if (name != '' || name != null) {
            start_loader();
            var formData = new FormData();
            formData.append('name', name);
            formData.append('id', id);
            $.ajax({
                type: 'POST',
                url: Laravel.url + '/super-admin/home-designs/check-slug-edit',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false,
                success: function(data) {
                    end_loader();
                    debugger;
                    if (data['status'] == 'no') {
                        myValidatedForm = false;
                        errorDisplay('This name has been already taken!');
                        $('#design_title').focus();
                    }
                },
                error: function(error) {
                    end_loader();
                    debugger;
                    errorDisplay('Something went worng !');
                }
            });
        } else {
            errorDisplay('Please enter the home design name!');
            $('#design_title').focus();
        }

    }

    function validateForm() {
        debugger;
        var check_type_of_feature = true;
        var check_feature = true;
        for (let i = 0; i < $('.my-feature-select').length; i++) {
            if (($('.my-feature-select')[i].value == '' && $('.my-feature')[i].value != '') || ($('.my-feature-select')[i].value != '' && $('.my-feature')[i].value == '')) {
                if ($('.my-feature-select')[i].value == '') {
                    check_type_of_feature = false;
                    $('.my-feature-select')[i].focus();
                }
                if ($('.my-feature')[i].value == '') {
                    check_feature = false;
                    $('.my-feature')[i].focus();
                }
                myValidatedForm = false;
                break;
            }
        }

        var check_room_type = true;
        var check_room_name = true;
        var check_dimension = true;
        for (let i = 0; i < $('.type-dimension').length; i++) {
            if (($('.type-dimension')[i].value == '' && $('.my-room-name')[i].value == '' && $('.dimension-name')[i].value == '') || ($('.type-dimension')[i].value != '' && $('.my-room-name')[i].value != '' && $('.dimension-name')[i].value != '')) {

            } else {
                if ($('.type-dimension')[i] == '') {
                    check_room_type = false;
                    $('.type-dimension')[i].focus();
                }

                if ($('.my-room-name')[i] == '') {
                    check_room_name = false;
                    $('.my-room-name')[i].focus();
                }

                if ($('.dimension-name')[i] == '') {
                    check_dimension = false;
                    $('.dimension-name')[i].focus();
                }
                myValidatedForm = false;
                break;
            }
        }
        if (!check_type_of_feature) {
            errorDisplay('Please select type of feature!');
        }
        if (!check_feature) {
            errorDisplay('Please input feature!')
        }
        if (!check_room_type) {
            errorDisplay('Please select type of room!');
        }
        if (!check_room_name) {
            errorDisplay('Please enter room name!')
        }
        if (!check_dimension) {
            errorDisplay('Please enter room dimension!')
        }
        return myValidatedForm;
    }
</script>
@endsection