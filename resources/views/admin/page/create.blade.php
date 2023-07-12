@extends('admin.layouts.app')
@section('title')
    <title>Page Create</title>
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
                            <h3>Add New Page</h3>
                            <p class="ms-4 mb-0">Fill the following fields to add new page.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/pages')}}"><img
                                                src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            {!! Form::open(['url' => 'super-admin/pages', 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true, 'onsubmit' => 'return validateForm()']) !!}
                            <div class="form-group batch-form">
                                {{-- <div class="col-md-12"> --}}
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Page Name<span
                                                style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" name="page_name"
                                                   id="page_name" value="{{old('page_name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="design_description">Page Description</label>
                                        <textarea name="page_description" id="page_description" cols="30"
                                                  rows="5" class="form-control form-control-lg"
                                                  placeholder="">{{old('page_description')}}</textarea>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Page Image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="page_image"
                                                   id="page_image" value="{{old('page_iamge')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="design_title">Image Alt</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"
                                                   name="page_image_alt"
                                                   id="page_image_alt" value="{{old('page_image_alt')}}">
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
                                        <input class="form-control form-control-lg" type="text" id="seo_description"
                                               name="seo_description">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Seo Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_keyword"
                                               name="seo_keyword">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_meta_keyword"
                                               name="seo_meta_keyword">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                        <select id="status" name="status" class="form-select"
                                                aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status</option>
                                            @foreach(config('custom.status') as $in2 => $val2)
                                                <option value="{{$in2}}"
                                                        @if(old('status') == $in2) selected @endif>{{$val2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4 submit-section">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                            <i class="fas fa-angle-double-right"></i></button>
                                        <a href="{{url('super-admin/home-designs')}}">
                                            <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i
                                                    class="fa-solid fa-angles-right"></i></button>
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
        ClassicEditor
            .create(document.querySelector('#page_description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body2'), {
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body3'), {
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body4'), {
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
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
                var html = '<div class="row gy-2 gx-4 py-2 control-group image_input_group" id="imageDom' + imageDomCount + '">' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="image[]" class="form-label">Image (916x500)<span style="color: red;">*</span></label>' +
                    '<input class="form-control form-control-lg my-image" type="file" id="image' + imageDomCount + '" name="image[]" placeholder="916x500" required>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="image_alt[]">Image Alt</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-image-alt"   name="image_alt[]" id="image_alt' + imageDomCount + '" value="">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-2">' +
                    '<label for="image_order_by[]">Order By<span style="color: red;">*</span></label>' +
                    '<div class="input-group">' +
                    '<input type="number" class="form-control form-control-lg my-order-by"   name="image_order_by[]" id="order_by' + imageDomCount + '"  min="1" step="1" value="' + imageDomCount + '" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn1 " type="button" onclick="removeImageDom(' + imageDomCount + ')">Remove </button>' +
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
                var html = '<div class="row gy-2 gx-4 py-2 control-group features_input_group" id="featureDom' + featueDomCount + '">' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="type_of_feature[]">Features Type</label>' +
                    '<select id="type_of_feature' + featueDomCount + '" name="type_of_feature[]" class="form-select my-feature-select" aria-label="Select the features type">' +
                    '<option selected disabled value="">Open this select menu</option>' +
                    '@foreach(config('custom.home_design_feature_types') as $index => $value)' +
                    '<option value="{{$index}}" @if(old('type_of_feature') == $index) selected @endif>{{$value}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="feature[]">Features</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-feature"   name="feature[]" id="feature' + featueDomCount + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-2">' +
                    '<label for="order_by[]">Order By</label>' +
                    '<div class="input-group">' +
                    '<input type="number" class="form-control form-control-lg"   name="feature_order_by[]" id="feature_order_by' + featueDomCount + '"  min="1" step="1" value="' + featueDomCount + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn' + featueDomCount + ' " type="button" onclick="removeFeatureDom(' + featueDomCount + ')">Remove </button>' +
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

        {{--function getMoreSection() {--}}
        {{--    var check_room_type = true;--}}
        {{--    var check_room_name = true;--}}
        {{--    var check_dimension = true;--}}
        {{--    for (let i = 0; i < $('.type-dimension').length; i++) {--}}
        {{--        if ($('.type-dimension')[i].value == '') {--}}
        {{--            $('.type-dimension')[i].focus();--}}
        {{--            check_room_type = false;--}}
        {{--            break;--}}
        {{--        }--}}
        {{--    }--}}

        {{--    for (let i = 0; i < $('.my-room-name').length; i++) {--}}
        {{--        if ($('.my-room-name')[i].value == '') {--}}
        {{--            $('.my-room-name')[i].focus();--}}
        {{--            check_room_name = false;--}}
        {{--            break;--}}
        {{--        }--}}
        {{--    }--}}

        {{--    for (let i = 0; i < $('.dimension-name').length; i++) {--}}
        {{--        if ($('.dimension-name')[i].value == '') {--}}
        {{--            $('.dimension-name')[i].focus();--}}
        {{--            check_dimension = false;--}}
        {{--            break;--}}
        {{--        }--}}
        {{--    }--}}

        {{--    if (check_room_type && check_room_name && check_dimension) {--}}
        {{--        dimensionDomDomCount = dimensionDomDomCount + 1;--}}
        {{--        var html = '<div class="row gy-2 gx-4 py-2 pt-0 mt0 control-group floor-plan_input_group" id="myDimension' + dimensionDomDomCount + '">' +--}}
        {{--            '<div class="col-sm-6 col-md-2">' +--}}
        {{--            '<label for="type_of_dimension[]">Room Type</label>' +--}}
        {{--            '<select id="type_of_dimension' + dimensionDomDomCount + '" name="type_of_dimension[]" class="form-select type-dimension"  aria-label="Select the room type">' +--}}
        {{--            '<option value="" selected disabled>Please select Room type</option>' +--}}
        {{--            '@foreach(config('custom.room_types') as $in => $val)' +--}}
        {{--            '<option value="{{$in}}" @if(old('type_of_dimension') == $in) selected @endif>{{$val}}</option>' +--}}
        {{--            '@endforeach' +--}}
        {{--            '</select>' +--}}
        {{--            '</div>' +--}}
        {{--            '<div class="col-sm-6 col-md-4">' +--}}
        {{--            '<label for="room_name">Room Name</label>' +--}}
        {{--            '<div class="input-group">' +--}}
        {{--            '<input type="text" class="form-control form-control-lg my-room-name"   name="room_name[]" id="room_name' + dimensionDomDomCount + '" >' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>' +--}}
        {{--            '<div class="col-7 col-sm-6 col-md-4">' +--}}
        {{--            '<label for="room_dimension">Dimensions</label>' +--}}
        {{--            '<div class="input-group">' +--}}
        {{--            '<input type="text" class="form-control form-control-lg dimension-name"   name="room_dimension[]" id="room_dimension' + dimensionDomDomCount + '" placeholder="100x100">' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>' +--}}
        {{--            '<div class="col-1 col-md-2 d-flex align-self-end mt-2 mt-md-0">' +--}}
        {{--            '<div class="me-2">' +--}}
        {{--            '<button class="btn btn-danger remove_item_btn1 " type="button" onclick="removeDimensionDom(' + dimensionDomDomCount + ')">Remove </button>' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>';--}}
        {{--        $('#roomDimensionAll').append(html);--}}
        {{--    } else {--}}
        {{--        if (!check_room_type) {--}}
        {{--            errorDisplay('Please select type of room!');--}}
        {{--        }--}}
        {{--        if (!check_room_name) {--}}
        {{--            errorDisplay('Please enter room name!')--}}
        {{--        }--}}
        {{--        if (!check_dimension) {--}}
        {{--            errorDisplay('Please enter room dimension!')--}}
        {{--        }--}}
        {{--    }--}}

        {{--}--}}


        function getPageContentDom(id) {
            if ($("#section_radio_yes" + id).is(":checked")) {
                $('#page-content-dom' + id).show();
            }
            if ($("#section_radio_no" + id).is(":checked")) {
                $('#page-content-dom' + id).hide();
            }
        }

        var pageSectionCount = 1;

        function getMorePageContent(id) {
            pageSectionCount = pageSectionCount + 1;
            var html = '<div id="page-section-setting' + pageSectionCount + '">' +
                '<div class="row gy-2 gx-4 py-2 pt-0 mt-0 control-group floor-plan_input_group" id="settingSection' + pageSectionCount + '">' +
                '<div class="col-sm-6 col-md-4">' +
                '<label for="page_content_title">Title <span style="color: red;">*</span></label>' +
                '<div class="input-group">' +
                '<input type="text" class="form-control form-control-lg setting-input-1" name="page_content_title[' + id + ']" id="page_content_title' + pageSectionCount + '">' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6 col-md-4">' +
                '<label for="room_dimension">Description</label>' +
                '<div class="input-group">' +
                '<textarea name="page_content_description[' + id + ']" id="page_content_description' + pageSectionCount + '" cols="30" rows="5" class="form-control form-control-lg setting-input-2" placeholder=""></textarea>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6 col-md-2">' +
                '<label for="floor_plan_image" class="form-label">Image</label>' +
                '<input class="form-control form-control-lg setting-input-3" type="file" id="page_content_image' + pageSectionCount + '" name="page_content_image[' + id + ']">' +
                '</div>' +
                '<div class="col-1 col-md-2 d-flex align-self-between mt-3 mt-md-4">' +
                '<div class="me-2">' +
                '<button class="btn btn-danger remove_item_btn1 " type="button"onclick="removePageContent(' + pageSectionCount + ')">Remove </button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#page-section-all' + id + '').append(html);
        }

        function removeSection(id) {
            if ($('.type-dimension').length > 1) {
                $('#myDimension' + id).remove();
            } else {
                errorDisplay('Please add at enter one room dimension!');
            }
        }

        function removePageContent(id) {
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
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success: function (data) {
                        end_loader();
                        debugger;
                        if (data['status'] == 'no') {
                            myValidatedForm = false;
                            errorDisplay('This name has been already taken!');
                            $('#design_title').focus();
                        }
                    },
                    error: function (error) {
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
