@extends('admin.layouts.app')
@section('title')
    <title>Page</title>
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
                            <h3>EDit Page</h3>
                            <p class="ms-4 mb-0">Fill the following fields to edit page content.</p>
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
                            {!! Form::open(['url' => 'super-admin/pages-section-edit/'.$setting->id, 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true]) !!}
                            <div class="form-group batch-form">
                                <div class="form-grp mt-3">
                                    <div class="row gy-3">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="design_title">Section Name<span
                                                            style="color: red;">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-lg"
                                                               name="section_name"
                                                               id="section_name" value="{{$setting->section_name}}"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mt-3">
                                                        <div class="col-sm-6">
                                                            <label for="section_name" class="form-label">Section
                                                                Image</label>
                                                            <input class="form-control form-control-lg" type="file"
                                                                   id="section_image"
                                                                   name="section_image"
                                                                   value="{{old('section_image')}}">
                                                            @if(file_exists($setting->section_image))
                                                                <span><img src="{{url($setting->section_image)}}" alt=""
                                                                           width="100px;"></span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="floor_plan_image_alt" class="form-label">Section
                                                                Image Alt</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                   id="section_image_alt" name="section_image_alt"
                                                                   value="{{$setting->section_image_alt}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="design_description">Section Description</label>
                                            <textarea name="section_description" id="body1" cols="30"
                                                      rows="5" class="form-control form-control-lg"
                                                      placeholder="">{!! $setting->section_description !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <p>Do you want section content?</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="section_radio"
                                                       id="section_radio_yes1" value="1" onclick="getPageContentDom(1)"
                                                       @if($setting->page_content_lists->count() > 0) checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="section_radio"
                                                       id="section_radio_no1" value="2"
                                                       @if($setting->page_content_lists->count() == 0) checked @endif
                                                       onclick="getPageContentDom(1)">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>

                                        </div>
                                    </div>


                                    @if($setting->page_content_lists->count() > 0)
                                        <div class=" mt-4" id="page-content-dom1">
                                            <div id="page-section-all1">
                                                @foreach($setting->page_content_lists as $page_content_list)
                                                    <div id="page-section-setting{{$page_content_list->id}}"
                                                         class="my-page-content">
                                                        <div
                                                            class="row gy-2 gx-4 py-2 pt-0 mt-0 control-group floor-plan_input_group"
                                                            id="settingSection">
                                                            <div class="col-sm-6 col-md-4">
                                                                <label for="page_content_title">Title <span
                                                                        style="color: red;">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                           class="form-control form-control-lg setting-input-1"
                                                                           name="page_content_title[]"
                                                                           id="page_content_title"
                                                                           value="{{$page_content_list->page_content_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <label for="room_dimension">Description</label>
                                                                <div class="input-group">
                                                                    <textarea name="page_content_description[]"
                                                                              id="page_content_description" cols="30"
                                                                              rows="5"
                                                                              class="form-control form-control-lg setting-input-2"
                                                                              placeholder="">{{$page_content_list->page_content_description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-2">
                                                                <label for="floor_plan_image"
                                                                       class="form-label">Icon</label>
                                                                <input
                                                                    class="form-control form-control-lg setting-input-3"
                                                                    type="file"
                                                                    id="page_content_image' + pageSectionCount + '"
                                                                    name="page_content_image[]">
                                                            </div>
                                                            <div
                                                                class="col-1 col-md-2 d-flex align-self-between mt-3 mt-md-4">
                                                                <div class="me-2">
                                                                    <button class="btn btn-danger remove_item_btn1 "
                                                                            type="button"
                                                                            onclick="removePageContent({{$page_content_list->id}})">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="row mt-1">
                                                <div class="add-button-section">
                                                    <button type="button" class="btn btn-primary add-more-btn1"
                                                            onclick="getMorePageContent(1)">Add More
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <div class=" mt-4" id="page-content-dom1" style="display: none">
                                            <div id="page-section-all1">

                                            </div>
                                            <div class="row mt-1">
                                                <div class="add-button-section">
                                                    <button type="button" class="btn btn-primary add-more-btn1"
                                                            onclick="getMorePageContent(1)">Add More
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

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

        function getPageContentDom(id) {
            if ($("#section_radio_yes" + id).is(":checked")) {
                $('#page-content-dom' + id).show();
                getMorePageContent(id);

            }
            if ($("#section_radio_no" + id).is(":checked")) {
                $('#page-content-dom' + id).hide();
                $('.my-page-content').remove();
            }
        }

        var pageSectionCount = '<?php $pageSectionCount ?>';

        function getMorePageContent(id) {
            pageSectionCount = pageSectionCount + 1;
            var html = '<div id="page-section-setting' + pageSectionCount + '" class="my-page-content">' +
                '<div class="row gy-2 gx-4 py-2 pt-0 mt-0 control-group floor-plan_input_group" id="settingSection' + pageSectionCount + '">' +
                '<div class="col-sm-6 col-md-4">' +
                '<label for="page_content_title">Title <span style="color: red;">*</span></label>' +
                '<div class="input-group">' +
                '<input type="text" class="form-control form-control-lg setting-input-1" name="page_content_title[]" id="page_content_title' + pageSectionCount + '">' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6 col-md-4">' +
                '<label for="room_dimension">Description</label>' +
                '<div class="input-group">' +
                '<textarea name="page_content_description[]" id="page_content_description' + pageSectionCount + '" cols="30" rows="5" class="form-control form-control-lg setting-input-2" placeholder=""></textarea>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-6 col-md-2">' +
                '<label for="floor_plan_image" class="form-label">Icon</label>' +
                '<input class="form-control form-control-lg setting-input-3" type="file" id="page_content_image' + pageSectionCount + '" name="page_content_image[]">' +
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
            if ($('.setting-input-1').length > 1) {
                $('#page-section-setting' + id).remove();
            } else {
                errorDisplay('Please add at enter one content!');
            }
        }

    </script>
@endsection
