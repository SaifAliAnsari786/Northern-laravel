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
                                        <a href="{{ url('super-admin/service') }}"><img
                                                src="{{ url('images/cancel-icon.png') }}" alt="cancel-icon" /></a>
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
                                    <div class="row pt-2">
                                        <div class="col-md-4">
                                            <label >Title<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="text"
                                                id="" name="title" placeholder="Title" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Logo">Logo<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="file"
                                                id="" name="logo" placeholder="logo image" >
                                        </div>
                                        <div class="col-md-4">
                                            <label>Logo  Image Alt<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="text"
                                                id="" name="logo_image_alt" placeholder="logo image Alt" >
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-6 pt-3 pt-md-0">
                                            <label for="background_image_description">Description<span
                                                    style="color: red;">*</span></label>
                                            <textarea name="description" id="body1" name="description">
                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="Logo">Background Image<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="file"
                                                id="" name="background_image" placeholder="image" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Logo">Background Image Alt<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="text"
                                                id="" name="background_image_alt" placeholder="Background Image Alt" >
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-md-6 pt-3 pt-md-0">
                                            <label for="background_image_description">Background Image description<span
                                                    style="color: red;">*</span></label>
                                            <textarea name="background_image_description" id="body2" name="background_image_description">
                                        </textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Description Image Position</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="description_image_position" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Right</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="description_image_position" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">Left</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label>Service Image<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="file"
                                                id="" name="service_image" placeholder="Service mage" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Logo">Service Image Alt<span style="color: red;">*</span></label>
                                            <input class="form-control form-control-lg my-image" type="text"
                                                id="" name="service_image_description	" placeholder="Service Image Alt" >
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 col-md-6 pt-3 pt-md-0">
                                            <label for="background_image_description">Service Image description<span
                                                    style="color: red;">*</span></label>
                                            <textarea name="service_image_description" id="body3" name="Service Image description">
                                        </textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="seo_title" class="form-label">Form</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form"
                                                    id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form"
                                                    id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_title" class="form-label">Seo Title</label>
                                            <input class="form-control form-control-lg" type="text" id="seo_title"
                                                name="seo_title">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_description" class="form-label">Seo Description</label>
                                            <input class="form-control form-control-lg" type="text"
                                                id="seo_description" name="seo_description">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                            <input class="form-control form-control-lg" type="text" id="meta_keyword"
                                                name="meta_keyword">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_keyword" class="form-label">Meta Keyword Description</label>
                                            <input class="form-control form-control-lg" type="text"
                                                id="meta_keyword_description" name="meta_keyword_description">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="service_description_title" class="form-label">Service Description
                                                Title</label>
                                            <input class="form-control form-control-lg" type="text"
                                                id="service_description_title" name="service_description_title">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="status" class="form-label">Status<span
                                                    style="color: red;">*</span></label>
                                            <select id="status" name="status" class="form-select"
                                                aria-label="Select the status type" required>
                                                <option value="" selected disabled>Please select status</option>
                                                @foreach (config('custom.status') as $in2 => $val2)
                                                    <option value="{{ $in2 }}"
                                                        @if (old('status') == $in2) selected @endif>
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
                                                <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i
                                                        class="fa-solid fa-angles-right"></i></button>
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
            .create(document.querySelector('#body1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body3'))
            .catch(error => {
                console.error(error);
            });
        var imageDomCount = 1;

        function getMoreImageDom() {
            var check_image = true;
            for (let i = 0; i < $('.my-image').length; i++) {
                if ($('.my-image')[i].value == '') {
                    $('.my-image')[i].focus();
                    check_image = false;
                    break;
                }
            }
            if (check_image) {
                imageDomCount = imageDomCount + 1;
                var html = '<div class="row gy-2 gx-4 py-2 control-group image_input_group" id="imageDom' + imageDomCount +
                    '">' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="image[]" class="form-label">Image (916x500)<span style="color: red;">*</span></label>' +
                    '<input class="form-control form-control-lg my-image" type="file" id="image' + imageDomCount +
                    '" name="image[]" placeholder="916x500" required>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="image_alt[]">Image Alt</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-image-alt"   name="image_alt[]" id="image_alt' +
                    imageDomCount + '" value="">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-2">' +
                    '<label for="image_order_by[]">Order By<span style="color: red;">*</span></label>' +
                    '<div class="input-group">' +
                    '<input type="number" class="form-control form-control-lg my-order-by"   name="image_order_by[]" id="order_by' +
                    imageDomCount + '"  min="1" step="1" value="' + imageDomCount + '" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn1 " type="button" onclick="removeImageDom(' +
                    imageDomCount + ')">Remove </button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#imageDomAll').append(html);
            } else {
                errorDisplay('Please select the image!');
            }
        }

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

            if (check_type_of_feature && check_feature) {
                featueDomCount = featueDomCount + 1;
                var html = '<div class="row gy-2 gx-4 py-2 control-group features_input_group" id="featureDom' +
                    featueDomCount + '">' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="type_of_feature[]">Features Type</label>' +
                    '<select id="type_of_feature' + featueDomCount +
                    '" name="type_of_feature[]" class="form-select my-feature-select" aria-label="Select the features type">' +
                    '<option selected disabled value="">Open this select menu</option>' +
                    '@foreach (config('custom.home_design_feature_types') as $index => $value)' +
                    '<option value="{{ $index }}" @if (old('type_of_feature') == $index) selected @endif>{{ $value }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="feature[]">Features</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-feature"   name="feature[]" id="feature' +
                    featueDomCount + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-2">' +
                    '<label for="order_by[]">Order By</label>' +
                    '<div class="input-group">' +
                    '<input type="number" class="form-control form-control-lg"   name="feature_order_by[]" id="feature_order_by' +
                    featueDomCount + '"  min="1" step="1" value="' + featueDomCount + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn' + featueDomCount +
                    ' " type="button" onclick="removeFeatureDom(' + featueDomCount + ')">Remove </button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#featureDomAll').append(html);
            } else {
                if (!check_type_of_feature) {
                    errorDisplay('Please select type of feature!');
                }
                if (!check_feature) {
                    errorDisplay('Please input feature!')
                }
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

            if (check_room_type && check_room_name && check_dimension) {
                dimensionDomDomCount = dimensionDomDomCount + 1;
                var html = '<div class="row gy-2 gx-4 py-2 control-group floor-plan_input_group" id="myDimension' +
                    dimensionDomDomCount + '">' +
                    '<div class="col-sm-6 col-md-2">' +
                    '<label for="type_of_dimension[]">Room Type</label>' +
                    '<select id="type_of_dimension' + dimensionDomDomCount +
                    '" name="type_of_dimension[]" class="form-select type-dimension"  aria-label="Select the room type">' +
                    '<option value="" selected disabled>Please select Room type</option>' +
                    '@foreach (config('custom.room_types') as $in => $val)' +
                    '<option value="{{ $in }}" @if (old('type_of_dimension') == $in) selected @endif>{{ $val }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="room_name">Room Name</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-room-name"   name="room_name[]" id="room_name' +
                    dimensionDomDomCount + '" >' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-4">' +
                    '<label for="room_dimension">Dimensions</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg dimension-name"   name="room_dimension[]" id="room_dimension' +
                    dimensionDomDomCount + '" placeholder="100x100">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end mt-2 mt-md-0">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn1 " type="button" onclick="removeDimensionDom(' +
                    dimensionDomDomCount + ')">Remove </button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#roomDimensionAll').append(html);
            } else {
                if (!check_room_type) {
                    errorDisplay('Please select type of room!');
                }
                if (!check_room_name) {
                    errorDisplay('Please enter room name!')
                }
                if (!check_dimension) {
                    errorDisplay('Please enter room dimension!')
                }
            }

        }

        function removeDimensionDom(id) {
            if ($('.type-dimension').length > 1) {
                $('#myDimension' + id).remove();
            } else {
                errorDisplay('Please add at enter one room dimension!');
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
                    url: Laravel.url + '/super-admin/home-designs/check-slug',
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
    </script>>
@endsection
