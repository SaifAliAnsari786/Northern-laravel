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
                                <a href="{{ url('super-admin/service') }}"><img src="{{url('frontend/cancel-icon.png')}}" alt="cancel-icon" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('success.success')
                @include('errors.error')
                <div class="row p-4 form-wrap">
                    {!! Form::open(['url' => 'super-admin/service', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group batch-form">
                        <div class="col-md-12">
                            {{-- <div class="image-upload_item form-grp mt-4">
                                        <div id="imageDomAll">
                                            <div class="row gy-2 gx-4 py-2 control-group image_input_group" id="imageDom1">
                                                <div class="col-sm-6 col-md-4">
                                                    <label for="image[]" class="form-label">Image</label>
                                                    <input class="form-control form-control-lg my-image" type="file"
                                                        id="image1" name="image[]">
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <label for="image_alt[]">Image Alt</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control form-control-lg my-image-alt"
                                                            name="image_alt[]" id="image_alt1" value="">
                                                    </div>
                                                </div>
                                                <div class="col-7 col-sm-6 col-md-2">
                                                    <label for="image_order_by[]">Order By<span
                                                            style="color: red;">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number"
                                                            class="form-control form-control-lg my-order-by"
                                                            name="image_order_by[]" id="order_by1" min="1"
                                                            step="1" value="1" required>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-md-2 d-flex align-self-end">
                                                    <div class="me-2">
                                                        <button class="btn btn-danger remove_item_btn1 " type="button"
                                                            onclick="removeImageDom(1)">Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="add-button-section">
                                                <button type="button" class="btn btn-primary add-more-btn1"
                                                    onclick="getMoreImageDom(1)">Add More
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}
                            <div class="row pt-2">
                                <div class="col-md-4">
                                    <label>Title<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="text" id="" name="title" placeholder="Title">
                                </div>
                                <div class="col-md-4">
                                    <label for="Logo">Logo<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="file" id="" name="logo" placeholder="logo image">
                                </div>
                                <div class="col-md-4">
                                    <label>Logo Image Alt<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="text" id="" name="logo_image_alt" placeholder="logo image Alt">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6 pt-3 pt-md-0">
                                    <label for="background_image_description">Description<span style="color: red;">*</span></label>
                                    <textarea name="description" id="body1" name="description">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-4">
                                    <label for="background_title">Background Title </label>
                                    <input class="form-control form-control-lg my-image" type="text" id="" name="background_title" placeholder="Enter Background Title" >
                                </div>
                                
                                <div class="col-md-4">
                                        <label for="background_image">Background Image <span class="text-danger">*</span></label>
                                        <input type="file" name="background_image" class="form-control" id="background_image" />
                                </div>

                                <div class="col-md-4">
                                        <label for="background_image_alt">Background Image Alt </label>
                                        <input type="text" class="form-control" name="background_image_alt" placeholder="Enter Background Image Alt">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 col-md-6 pt-3 pt-md-0">
                                    <label for="background_image_description">Background Image description<span style="color: red;">*</span></label>
                                    <textarea name="background_image_description" id="body2" name="background_image_description">
                                    </textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Description Image Position</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Right</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Left</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <label>Service Image<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="file" id="" name="service_image" placeholder="Service Image">
                                </div>
                                <div class="col-md-6">
                                    <label for="service_image_alt">Service Image Alt<span style="color: red;">*</span></label>
                                    <input class="form-control form-control-lg my-image" type="text" id="" name="service_image_alt" placeholder="Service Image Alt">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 col-md-6 pt-3 pt-md-0">
                                    <label for="service_image_description">Service Image description<span style="color: red;">*</span></label>
                                    <textarea name="service_image_description" id="body3" name="service_image_description">
                                        </textarea>
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
                            <div class="col-sm-6">
                                <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                    <option value="" selected disabled>Please select status</option>
                                    @foreach (config('custom.status') as $in2 => $val2)
                                    <option value="{{ $in2 }}" @if (old('status')==$in2) selected @endif>
                                        {{ $val2 }}
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
    ClassicEditor
        .create(document.querySelector('#body1'), {
            
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body2'), {
              
             
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body3'), {
        
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body4'), {
            
        })
        .catch(error => {
            console.error(error);
        });

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
    }

        for (let i = 0; i < $('.my-feature').length; i++) {
            if ($('.my-feature')[i].value == '') {
                $('.my-feature')[i].focus();
                check_feature = false;
                break;
            }
        }

        
        

    

    function removeFeatureDom(id) {
        if ($('.my-feature-select').length > 1) {
            $('#featureDom' + id).remove();
        } else {
            errorDisplay('Please add at least one feature!');
        }
    }

    var dimensionDomDomCount = 1;

    function getMoreDimensionDom() {
        var check_room_type = true;
        var check_room_name = true;
        var check_dimension = true;
        for (let i = 0; i < $('.type-dimension').length; i++) {
            if ($('.type-dimension')[i].value == '') {
                $('.type-dimension')[i].focus();
                check_room_type = false;
                break;
            }
        }

        for (let i = 0; i < $('.my-room-name').length; i++) {
            if ($('.my-room-name')[i].value == '') {
                $('.my-room-name')[i].focus();
                check_room_name = false;
                break;
            }
        }

        for (let i = 0; i < $('.dimension-name').length; i++) {
            if ($('.dimension-name')[i].value == '') {
                $('.dimension-name')[i].focus();
                check_dimension = false;
                break;
            }
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
</script>>
@endsection