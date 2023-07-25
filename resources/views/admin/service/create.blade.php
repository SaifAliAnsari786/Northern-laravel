@extends('admin.layouts.app')
@section('title')
<title>New Service</title>
@endsection
@section('main-panel')
<div class="main-panel">
    {{-- <div>
            <ul class="admin-breadcrumb ">
                <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
    <li>Setting</li>
    </ul>
</div> --}}
<div class="content-wrapper add-new-design">
    {{-- start loader --}}
    <div class="loader loader-default" id="loader"></div>
    {{-- end loader --}}

    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header p-4">
                    <h3>Add New Service</h3>
                    <p class="ms-4 mb-0">Fill the following fields to add new Service.</p>
                    <div class="tbl-buttons">
                        <ul>
                            <li>
                                <a href="{{ url('super-admin/service') }}"><img src="{{ url('images/cancel-icon.png') }}" alt="cancel-icon" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('success.success')
                @include('errors.error')
                <div class="row p-4 form-wrap">
                {!! Form::open(['url' => 'super-admin/service','method' => 'POST', 'files' => true]) !!}
                    <div class="form-group batch-form">
                        <div class="col-md-12">

                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <label for="Logo">Logo<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="file" id="" name="logo" placeholder="logo image" required>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <label for="Logo">Background Image<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="file" id="" name="background_image" placeholder="image" required>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 pt-3 pt-md-0">
                                <label for="background_image_description">Background Image description<span style="color: red;">*</span></label>
                                <textarea name="background_image_description" id="body1" name="background_image_description">
                                </textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label for="seo_title" class="form-label">Title</label>
                                <input class="form-control form-control-lg" type="text" id="title" name="title">
                            </div>
                            <div class="col-sm-6">
                                <label for="seo_title" class="form-label">Description</label>
                                <input class="form-control form-control-lg" type="text" id="description" name="description">
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label for="seo_title" class="form-label">Description Image Position</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Right</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Left</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="seo_title" class="form-label">Form</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="form" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="form" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="seo_title" class="form-label">Seo Title</label>
                                <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="seo_description" class="form-label">Seo Description</label>
                                <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                <input class="form-control form-control-lg" type="text" id="meta_keyword" name="meta_keyword">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="seo_keyword" class="form-label">Meta Keyword Description</label>
                                <input class="form-control form-control-lg" type="text" id="meta_keyword_description" name="meta_keyword_description">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="service_description_title" class="form-label">Service Description Title</label>
                                <input class="form-control form-control-lg" type="text" id="service_description_title" name="service_description_title">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                    <option value="" selected disabled>Please select status</option>
                                    @foreach (config('custom.status') as $in2 => $val2)
                                    <option value="{{ $in2 }}" @if (old('status')==$in2) selected @endif>{{ $val2 }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 submit-section">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                    <i class="fas fa-angle-double-right"></i></button>
                                <a href="{{ url('super-admin/service') }}">
                                    <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i class="fa-solid fa-angles-right"></i></button>
                                </a>

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
</div>
@endsection
@section('script')
<script>

    
    function removeImageDom(id) {
        if ($('.my-image').length > 1) {
            $('#imageDom' + id).remove();
        } else {
            errorDisplay('Please add at least one image!');
        }
    }

    var featueDomCount = 1;

    function getMoreFeatureDom() {
        var check_type_of_feature = true;
        var check_feature = true;
        for (let i = 0; i < $('.my-feature-select').length; i++) {
            if ($('.my-feature-select')[i].value == '') {
                $('.my-feature-select')[i].focus();
                check_type_of_feature = false;
                break;
            }
        }

        for (let i = 0; i < $('.my-feature').length; i++) {
            if ($('.my-feature')[i].value == '') {
                $('.my-feature')[i].focus();
                check_feature = false;
                break;
            }
        }
    }

    var myValidatedForm = true;

    function validateSlug() {
        debugger;
        var name = $('#design_title').val();
        if (name != '' || name != null) {
            start_loader();
            var formData = new FormData();
            formData.append('name', name);
            $.ajax({
                type: 'POST',
                url: Laravel.url + '/super-admin/service/check-slug',
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
            if (($('.my-feature-select')[i].value == '' && $('.my-feature')[i].value != '') || ($('.my-feature-select')[
                    i].value != '' && $('.my-feature')[i].value == '')) {
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
            if (($('.type-dimension')[i].value == '' && $('.my-room-name')[i].value == '' && $('.dimension-name')[i]
                    .value == '') || ($('.type-dimension')[i].value != '' && $('.my-room-name')[i].value != '' && $(
                    '.dimension-name')[i].value != '')) {

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