@extends('admin.layouts.app')
@section('title')
<title>Working NDS Form List</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header p-4">
                    <h3>Working NDS Form Lists</h3>
                    <div class="tbl-buttons">

                        <ul>

                            <li>

                                <a href="{{url('super-admin/workingatNDS')}}"><img src="{{url('frontend/cancel-icon.png')}}"alt="cancel-icon" /></a>

                            </li>

                        </ul>

                    </div>
                </div>
                <div class="row p-4 form-wrap">
                    <div class="form-group batch-form">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$workingnds->name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$workingnds->email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$workingnds->phone_no}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="design_title">Area of Interest</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="name" id="design_title" value="{{$workingnds->check}}" readonly>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-12 col-md-12 pt-3 pt-md-0">
                                        <label for="over_view_description">Message</label>
                                        <textarea name="over_view_description" id="body1" rows="15">{!! $workingnds->message !!}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="logo">Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" class="form-control" id="logo" accept="image/png, image/jpeg" />
                                    <img src="{{ url($workingnds->image) }}" height="80" width="100">

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