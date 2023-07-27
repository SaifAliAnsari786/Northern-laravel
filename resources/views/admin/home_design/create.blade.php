@extends('admin.layouts.app')
@section('title')
    <title>New Home Design</title>
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
            {{--start loader--}}
            <div class="loader loader-default" id="loader"></div>
            {{--end loader--}}


            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Add New Home Designs</h3>
                            <p class="ms-4 mb-0">Fill the following fields to add new home designs.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/home-designs')}}"><img
                                                src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            {!! Form::open(['url' => 'super-admin/home-designs', 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true, 'onsubmit' => 'return validateForm()']) !!}
                            <div class="form-group batch-form">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="design_title">Design Name<span
                                                    style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg" name="name"
                                                       id="design_title" value="{{old('name')}}" required
                                                       onchange="validateSlug()">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="design_type">Design Type<span
                                                    style="color: red;">*</span></label>
                                            <select id="design_type" name="design_type" class="form-select"
                                                    aria-label="Select the design type">
                                                <option value="" selected disabled>Please select design type</option>
                                                @foreach(config('custom.design_types') as $in1 => $val1)
                                                    <option value="{{$in1}}"
                                                            @if(old('design_type') == $in1) selected @endif>{{$val1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="design_description">Design Description<span style="color: red;">*</span></label>
                                            <textarea name="design_description" id="design_description" cols="30"
                                                      rows="5" class="form-control form-control-lg"
                                                      placeholder=""></textarea>
                                        </div>

                                    </div>
                                    <div class="image-upload_item form-grp mt-4">
                                        <div id="imageDomAll">
                                            <div class="row gy-2 gx-4 py-2 control-group image_input_group"
                                                 id="imageDom1">
                                                <div class="col-sm-6 col-md-4">
                                                    <label for="image[]" class="form-label">Image (916x500)<span
                                                            style="color: red;">*</span></label>
                                                    <input class="form-control form-control-lg my-image" type="file"
                                                           id="image1" name="image[]" placeholder="916x500" required>
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
                                                               name="image_order_by[]" id="order_by1" min="1" step="1"
                                                               value="1" required>
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
                                    </div>
                                </div><div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="design_title">Design Name<span
                                                    style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg" name="name"
                                                       id="design_title" value="{{old('name')}}" required
                                                       onchange="validateSlug()">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="design_type">Design Type<span
                                                    style="color: red;">*</span></label>
                                            <select id="design_type" name="design_type" class="form-select"
                                                    aria-label="Select the design type">
                                                <option value="" selected disabled>Please select design type</option>
                                                @foreach(config('custom.design_types') as $in1 => $val1)
                                                    <option value="{{$in1}}"
                                                            @if(old('design_type') == $in1) selected @endif>{{$val1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="design_description">Design Description<span style="color: red;">*</span></label>
                                            <textarea name="design_description" id="design_description" cols="30"
                                                      rows="5" class="form-control form-control-lg"
                                                      placeholder=""></textarea>
                                        </div>

                                    </div>
                                    <div class="image-upload_item form-grp mt-4">
                                        <div id="imageDomAll">
                                            <div class="row gy-2 gx-4 py-2 control-group image_input_group"
                                                 id="imageDom1">
                                                <div class="col-sm-6 col-md-4">
                                                    <label for="image[]" class="form-label">Image (916x500)<span
                                                            style="color: red;">*</span></label>
                                                    <input class="form-control form-control-lg my-image" type="file"
                                                           id="image1" name="image[]" placeholder="916x500" required>
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
                                                               name="image_order_by[]" id="order_by1" min="1" step="1"
                                                               value="1" required>
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
                                    </div>
                                </div>
                                <div class="features-upload_item form-grp mt-4 mb-2">
                                    <div id="featureDomAll">
                                        <div class="row gy-2 gx-4 py-2 control-group features_input_group"
                                             id="featureDom1">
                                            <div class="col-sm-6 col-md-4">
                                                <label for="type_of_feature[]">Features Type</label>

                                                <select id="type_of_feature1" name="type_of_feature[]"
                                                        class="form-select my-feature-select"
                                                        aria-label="Select the features type">
                                                    <option selected disabled value="">Open this select menu</option>
                                                    @foreach(config('custom.home_design_feature_types') as $index => $value)
                                                        <option value="{{$index}}"
                                                                @if(old('type_of_feature') == $index) selected @endif>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <label for="feature[]">Features</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-lg my-feature"
                                                           name="feature[]" id="feature1">
                                                </div>
                                            </div>
                                            <div class="col-7 col-sm-6 col-md-2">
                                                <label for="order_by[]">Order By</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control form-control-lg"
                                                           name="feature_order_by[]" id="feature_order_by1" min="1"
                                                           step="1" value="1">
                                                </div>
                                            </div>
                                            <div class="col-1 col-md-2 d-flex align-self-end">
                                                <div class="me-2">
                                                    <button class="btn btn-danger remove_item_btn1 " type="button"
                                                            onclick="removeFeatureDom(1)">Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="add-button-section">
                                            <button type="button" class="btn btn-primary add-more-btn1"
                                                    onclick="getMoreFeatureDom()">Add More
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-6 pt-3 pt-md-0">
                                        <label for="over_view_description">Overview Header<span
                                                style="color: red;">*</span></label>
                                        <textarea name="over_view_description" id="body1"
                                                  rows="15">{{old('over_view_description')}}
                                            </textarea>
                                    </div>
                                    <div class="col-12 col-md-6 pt-3 pt-md-0">
                                        <label for="over_view_description_end">Overview Footer<span style="color: red;">*</span></label>
                                        <textarea name="over_view_description_end" id="body2"
                                                  rows="15">{{old('over_view_description_end')}}
                                            </textarea>
                                    </div>
                                </div>
                                <div class="floor-plan_item form-grp mt-4">
                                    <div id="roomDimensionAll">
                                        <div class="row gy-2 gx-4 py-2 control-group floor-plan_input_group"
                                             id="myDimension1">
                                            <div class="col-sm-6 col-md-2">
                                                <label for="type_of_dimension[]">Room Type</label>
                                                <select id="type_of_dimension1" name="type_of_dimension[]"
                                                        class="form-select type-dimension"
                                                        aria-label="Select the room type">
                                                    <option value="" selected disabled>Please select Room type</option>
                                                    @foreach(config('custom.room_types') as $in => $val)
                                                        <option value="{{$in}}"
                                                                @if(old('type_of_dimension') == $in) selected @endif>{{$val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <label for="room_name">Room Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-lg my-room-name"
                                                           name="room_name[]" id="room_name1">
                                                </div>
                                            </div>
                                            <div class="col-7 col-sm-6 col-md-4">
                                                <label for="room_dimension">Dimensions</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg dimension-name"
                                                           name="room_dimension[]" id="room_dimension1"
                                                           placeholder="100x100">
                                                </div>
                                            </div>
                                            <div class="col-1 col-md-2 d-flex align-self-end mt-2 mt-md-0">
                                                <div class="me-2">
                                                    <button class="btn btn-danger remove_item_btn1 " type="button"
                                                            onclick="removeDimensionDom(1)">Remove
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="add-button-section">
                                            <button type="button" class="btn btn-primary add-more-btn1"
                                                    onclick="getMoreDimensionDom()">Add More
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-dimension_item form-grp mt-4 pb-2">
                                    <div class="row gy-2 gx-4 py-2 control-group">
                                        <div class="col-6 col-sm-4 col-md-2
                                            pt-1">
                                            <label for="total_area">Total Area<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                       name="total_area" id="total_area" value="{{old('total_area')}}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-2
                                            pt-1">
                                            <label for="house_area">House Area<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                       name="house_area" id="house_area" value="{{old('house_area')}}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-2
                                            pt-1">
                                            <label for="mid_block_width">Min Block Width<span
                                                    style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                       name="mid_block_width" id="mid_block_width"
                                                       value="{{old('mid_block_width')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-2
                                            pt-1">
                                            <label for="house_width">House Width<span
                                                    style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                       name="house_width" id="house_width"
                                                       value="{{old('house_width')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-2
                                            pt-1">
                                            <label for="house_depth">House Depth<span
                                                    style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                       name="house_depth" id="house_depth"
                                                       value="{{old('house_depth')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="floor_plan_description">Floor Plan Header<span
                                                style="color: red;">*</span></label>
                                        <textarea name="floor_plan_description" id="body3"
                                                  rows="15">{{old('floor_plan_description')}}
                                        </textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="floor_plan_note">Floor Plan Sidebar Note<span
                                                style="color: red;">*</span></label>
                                        <textarea name="floor_plan_note" id="floor_plan_note" cols="30" rows="5"
                                                  class="form-control form-control-lg"
                                                  placeholder="">{{old('floor_plan_note')}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="floor_plan_image" class="form-label">Floor Plan Image (367x676)<span
                                                style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg" type="file" id="floor_plan_image"
                                               name="floor_plan_image" placeholder="916x500" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="floor_plan_image_alt" class="form-label">Image Alt</label>
                                        <input class="form-control form-control-lg" type="text"
                                               id="floor_plan_image_alt" name="floor_plan_image_alt">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-6 pt-3 pt-md-0">
                                        <label for="virtual_tour_heading">Virtual tour header</label>
                                        <textarea name="virtual_tour_description" id="body4"
                                                  rows="15">{{old('virtual_tour_description')}}
                                                </textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="virtual_tour_link">Virtual Link</label>
                                        <input class="form-control form-control-lg" type="text" id="virtual_tour_link"
                                               name="virtual_tour_link">
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
            .create(document.querySelector('#body1'), {
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
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
                    uploadUrl: '{{route('image.upload')'?_token='.csrf_token()}}',
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
                var html = '<div class="row gy-2 gx-4 py-2 control-group floor-plan_input_group" id="myDimension' + dimensionDomDomCount + '">' +
                    '<div class="col-sm-6 col-md-2">' +
                    '<label for="type_of_dimension[]">Room Type</label>' +
                    '<select id="type_of_dimension' + dimensionDomDomCount + '" name="type_of_dimension[]" class="form-select type-dimension"  aria-label="Select the room type">' +
                    '<option value="" selected disabled>Please select Room type</option>' +
                    '@foreach(config('custom.room_types') as $in => $val)' +
                    '<option value="{{$in}}" @if(old('type_of_dimension') == $in) selected @endif>{{$val}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-sm-6 col-md-4">' +
                    '<label for="room_name">Room Name</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg my-room-name"   name="room_name[]" id="room_name' + dimensionDomDomCount + '" >' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 col-sm-6 col-md-4">' +
                    '<label for="room_dimension">Dimensions</label>' +
                    '<div class="input-group">' +
                    '<input type="text" class="form-control form-control-lg dimension-name"   name="room_dimension[]" id="room_dimension' + dimensionDomDomCount + '" placeholder="100x100">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1 col-md-2 d-flex align-self-end mt-2 mt-md-0">' +
                    '<div class="me-2">' +
                    '<button class="btn btn-danger remove_item_btn1 " type="button" onclick="removeDimensionDom(' + dimensionDomDomCount + ')">Remove </button>' +
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
