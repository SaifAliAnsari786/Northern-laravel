@extends('admin.layouts.app')
@section('title')
    <title>Testimonial</title>
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
                                        <a href="{{url('super-admin/testimonials')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            <form action="#" method="POST" class="row g-2 ps-2 pe-5 me-0">
                                <div class="form-group batch-form">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="design_title">Design Name<span style="color: red;">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-lg"   name="design_title" id="design_title" value="{{old('author_name')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-6">
                                                <label for="design_description">Design Description<span style="color: red;">*</span></label>
                                                <textarea name="design_description" id="design_description" cols="30" rows="5" class="form-control form-control-lg" placeholder=""></textarea>
                                            </div>

                                        </div>
                                        <div class="show_item">
                                            <div class="row gy-2 gx-4 pt-2 control-group image_input_group">
                                                {{-- <div class="input-group"> --}}

                                                    <div class="col-md-4">
                                                        <label for="formImage[]" class="form-label">Image<span style="color: red;">*</span></label>
                                                        <input class="form-control form-control-lg" type="file" id="formImage[]" name="formImage[]" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="img_alt[]">Image Alt<span style="color: red;">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-lg"   name="img_alt[]" id="img_alt[]" value="{{old('img_alt')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="img_order[]">Order By<span style="color: red;">*</span></label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control form-control-lg"   name="img_order[]" id="img_order[]" value="{{old('img_order')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 d-flex align-self-end">
                                                        <div class="me-2">
                                                            <button class="btn btn-danger remove_item_btn1 " type="button">Remove </button>
                                                        </div>


                                                    </div>





                                        </div>


                                    </div>
                                </div>
                                <div class="row py-2">

                                        <div class="add-button-section">
                                            <button type="button" class="btn btn-primary add-more-btn1">Add More</button>
                                        </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="design_title">Key Features<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="key_features" id="key_features" value="{{old('key_features')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex align-self-end pt-0 pt-md-2 pt-2 pt-md-0">
                                        <div class="">
                                            <button class="btn btn-danger remove_item_btn1 " type="button">Remove </button>
                                        </div>


                                    </div>
                                </div>
                                <div class="row py-2">

                                    <div class="add-button-section">
                                        <button type="button" class="btn btn-primary add-more-btn1">Add More</button>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 pt-3 pt-md-0">
                                        <label for="overview_heading">Overview Header<span style="color: red;">*</span></label>
                                        <textarea name="overview_heading" id="body"
                                                  rows="15">{{old('job_detail')}}
                                        </textarea>
                                    </div>
                                    <div class="col-12 col-md-6 pt-3 pt-md-0">
                                        <label for="overview_footer">Overview Footer<span style="color: red;">*</span></label>
                                        <textarea name="overview_footer" id="body1"
                                                  rows="15">{{old('job_detail')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 pt-3">
                                        <label for="floor_plan_heading">Floor Plan Header<span style="color: red;">*</span></label>
                                        <textarea name="floor_plan_heading" id="body3"
                                                  rows="15">{{old('job_detail')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label for="roomSelectType">Floor Plan<span style="color: red;">*</span></label>
                                        <select id="roomSelectType" name="roomSelectType" class="form-select " required aria-label="Select the room type">
                                            <option value="" selected disabled>Please select Room type</option>
                                            <option value="1">Bedroom</option>
                                            <option value="2">Bathroom</option>
                                            <option value="3">Living Room</option>
                                            <option value="4">Kitchen</option>
                                            <option value="5">Garage</option>
                                          </select>
                                    </div>
                                    <div class="col-md-2
                                     pt-3">
                                        <label for="room_dimension">Dimensions<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="room_dimension" id="room_dimension" value="{{old('room_dimension')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex align-self-end mt-2 mt-md-0">
                                        <div class="me-2">
                                            <button class="btn btn-danger remove_item_btn1 " type="button">Remove </button>
                                        </div>


                                    </div>
                                    <div class="row py-2">

                                        <div class="add-button-section">
                                            <button type="button" class="btn btn-primary add-more-btn1">Add More</button>
                                        </div>

                                </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-2
                                     pt-3">
                                        <label for="bedroom">Land Area<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="bedroom" id="bedroom" value="{{old('bedroom')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2
                                     pt-3">
                                        <label for="bedroom">House Area<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="bedroom" id="bedroom" value="{{old('bedroom')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2
                                     pt-3">
                                        <label for="bedroom">Min Block Width<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="bedroom" id="bedroom" value="{{old('bedroom')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2
                                     pt-3">
                                        <label for="bedroom">House Width<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="bedroom" id="bedroom" value="{{old('bedroom')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2
                                     pt-3">
                                        <label for="bedroom">House Depth<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="bedroom" id="bedroom" value="{{old('bedroom')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <label for="additional_features">Additional Features<span style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="additional_features" id="additional_features" value="{{old('additional_features')}}" required>
                                        </div>

                                    </div>
                                    <div class="col-1 d-flex align-self-end pt-0 pt-md-2 pt-2 pt-md-0">
                                        <div class="">
                                            <button class="btn btn-danger remove_item_btn1 " type="button">Remove </button>
                                        </div>


                                    </div>

                                </div>
                                <div class="row py-2">

                                    <div class="add-button-section">
                                        <button type="button" class="btn btn-primary add-more-btn1">Add More</button>
                                    </div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <label for="floor-sidebar-note">Floor Plan Sidebar Note<span style="color: red;">*</span></label>
                                        <textarea name="floor-sidebar-note" id="floor-sidebar-note" cols="30" rows="5" class="form-control form-control-lg" placeholder=""></textarea>
                                    </div>

                                        <div class="col-12 col-md-6 pt-3">
                                            <label for="virtual_tour_heading">Virtual tour header<span style="color: red;">*</span></label>
                                            <textarea name="virtual_tour_heading" id="body4"
                                                      rows="15">{{old('job_detail')}}
                                            </textarea>
                                        </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Doe" aria-label="Last name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="name@example.com" aria-label="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_input">Phone</label>
                                    <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="Phone"
            placeholder="Phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="region_select">Select your region</label>
                                    <select class="form-select" id="region_select" aria-label="Select your region" style="color:#6c757d;">
                                    <option selected>Select your region</option>
                                        <option value="1">North West Sydney</option>
                                        <option value="2">South West Sydney</option>
                                        <option value="3">Central Coast</option>
                                        <option value="4">Newcastle</option>
                                        <option value="5">Hunter</option>
                                        <option value="6">South Coast</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="build-suburb">Suburb you wish to build in</label>
                                    <input type="text" required maxlength="50" class="form-control" id="build-suburb" name="suburb"
            placeholder="Suburb you wish to build in">
                                </div>
                                <div class="col-md-6">
                                    <label for="haveLandOrNot_select">Do you have land?</label>
                                    <select class="form-select" id="haveLandOrNot_select" aria-label="DO YOU HAVE LAND?" style="color:#6c757d;">
                                    <option selected>Choose One</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="floorPlan_select">Preferred Floorplan Version</label>
                                    <select class="form-select" id="floorPlan_select" aria-label="PREFERRED FLOORPLAN VERSION" style="color:#6c757d;">
                                        <option selected>Select floorplan version</option>
                                            <option value="1">Adina</option>
                                            <option value="2">Madina</option>

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="comment">Message</label>
                                    <textarea name="Comments" id="comment" cols="30" rows="4" class="form-control" placeholder="I am interested in"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckPricing">
                                    <label class="form-check-label" for="flexCheckPricing">
                                    Please send me pricing and upgrade information for this home
                                    </label>
                                </div>
                                <div class="form-check mt-2 ">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckHomeLoans">
                                    <label class="form-check-label" for="flexCheckHomeLoans">
                                    I'd like to talk to Home Loans about finance options for my home.
                                    </label>
                                </div>
                                <div class="form-check mt-2 ">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckOffers">
                                    <label class="form-check-label" for="flexCheckOffers">
                                    Yes, send me occasional offers and news via email.
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'super-admin/testimonials','method' => 'POST', 'files' => true]) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Author Name<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"   name="author_name" value="{{old('author_name')}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 mt-2" id="my-name">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Designation<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"   name="author_designation" value="{{old('author_designation')}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 mt-2" id="my-name2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Review<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <textarea name="review" id="body" class="form-control" value="{{old('review')}}"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2" id="image">
                                                <div class="form-group batch-form">
                                                    {{-- <div class="col-md-12">
                                                        <div class="row"> --}}
                                                            {{-- <div class="col-md-4">
                                                                <label>Image <span style="color: red;">*</span></label>
                                                            </div> --}}
                                                            <div class="col-md-8">
                                                                <label>Image <span style="color: red;">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control"   name="image" required>
                                                                </div>
                                                            </div>
                                                        {{-- </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2" id="image-alt">
                                                <div class="form-group">
                                                    {{-- <div class="col-md-6">
                                                        <div class="row"> --}}
                                                            {{-- <div class="col-md-4">
                                                                <label>Image Alt<span style="color: red;">*</span></label>
                                                            </div> --}}
                                                            <div class="col-md-8">
                                                                <label>Image Alt<span style="color: red;">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"   name="image_alt" value="{{old('image_alt')}}">
                                                                </div>
                                                            </div>
                                                        {{-- </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-4">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Status <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <select  id="status" name="status" class="form-control" required>
                                                                        <option value="" selected disabled>Please select Status</option>
                                                                        @foreach(config('custom.status') as $in => $val)
                                                                            <option value="{{$in}}" @if(old('status') == $in) selected @endif>{{$val}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                            <div class="row">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                    <a href="{{url('super-admin/sliders')}}">
                                                        <button type="button">
                                                            Skip
                                                            <i class="fa-solid fa-angles-right"></i>
                                                        </button>
                                                    </a>
                                                    <button type="submit">
                                                        Save & Continue
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </button>
                                                </div>
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
    </div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>


    ClassicEditor
        .create( document.querySelector( '#body1' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#body2' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body3' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body4' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
            console.error( error );
        } );

</script>
@endsection
