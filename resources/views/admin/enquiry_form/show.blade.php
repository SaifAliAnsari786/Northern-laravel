@extends('admin.layouts.app')
@section('title')
<title>Enquiry Form List</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header p-4">
                    <h3>Enquiry Form Lists</h3>
                    <div class="tbl-buttons">

                        <ul>

                            <li>

                                <a href="{{url('super-admin/service')}}"><img src="{{url('frontend/cancel-icon.png')}}"alt="cancel-icon" /></a>

                            </li>

                        </ul>

                    </div>
                </div>
                <div class="row p-4 form-wrap">
                    <div class="form-group batch-form">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Enquiry Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->enquirer_name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Enquiry Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Enquiry Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->phone_no}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Participant Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->participant_name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Participant Age</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->participant_age}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Participant Gender</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->participant_gender}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Participant disability Type</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->participant_disability_type}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Participant Suburb</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->participant_suburb}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Postcode</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->postcode}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">State</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->state}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Heard</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->heard}}" readonly>
                                    </div>
                                </div>

                                <h3> Service Type</h3>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Core Support</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->core_support}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Capacity building supports</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->capacity_building_supports}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Coordination</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->coordination}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Plan Management</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$forms->plan_management}}" readonly>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-12 col-md-12 pt-3 pt-md-0">
                                        <label for="over_view_description">Message</label>
                                        <textarea name="over_view_description" id="body1" rows="15">{!! $forms->message !!}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="logo">Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" class="form-control" id="logo" accept="image/png, image/jpeg" />
                                    <img src="{{ url($forms->image) }}" height="80" width="100">

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
                .create(document.querySelector('#body1'))
                .catch(error => {
                    console.error(error);
                });
        </script>
        @endsection