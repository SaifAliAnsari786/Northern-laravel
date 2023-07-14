@extends('admin.layouts.app')
@section('title')
    <title>Slider</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            {{-- start loader --}}
            <div class="loader loader-default" id="loader"></div>
            {{-- end loader --}}
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Add Slider</h3>
                            <p class="ms-4">Fill the following fields to add a new slider</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{ url('super-admin/sliders') }}"><img
                                                src="{{ url('images/cancel-icon.png') }}" alt="cancel-icon" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'super-admin/sliders', 'method' => 'POST', 'files' => true]) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mt-4">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Slider Type <span
                                                                        style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <select id="type" name="type"
                                                                        class="form-control" required onchange="getDom()">
                                                                        <option value="" selected disabled>Please
                                                                            select type</option>
                                                                        @php
                                                                            $sliderTypes = config('custom.slider_types', []);
                                                                        @endphp
                                                                        @foreach ($sliderTypes as $in1 => $val1)
                                                                            <option value="{{ $in1 }}"
                                                                                @if (old('type') == $in1) selected @endif>
                                                                                {{ $val1 }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="section-dom">

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
                                                                    <select id="status" name="status"
                                                                        class="form-control" required>
                                                                        <option value="" selected disabled>Please
                                                                            select
                                                                            Status
                                                                        </option>
                                                                        @php
                                                                            $statusArray = config('custom.status', []);
                                                                        @endphp

                                                                        @foreach ($statusArray as $in => $val)
                                                                            <option value="{{ $in }}"
                                                                                @if (old('status') == $in) selected @endif>
                                                                                {{ $val }}
                                                                            </option>
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
                                                    <a href="{{ url('super-admin/sliders') }}">
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
    <script>
        function getDom() {
            var type = $('#type').val();
            if (type == 1) {
                $.ajax({
                    type: 'GET',
                    url: Laravel.url + '/super-admin/image-dom',
                    success: function(data) {
                        $('#my-dom').remove();
                        $('#section-dom').append(data['html']);
                    },
                    error: function(error) {
                        // errorDisplay(error["responseJSON"]["message"]);
                    }
                });
            } else {
                $.ajax({
                    type: 'GET',
                    url: Laravel.url + '/super-admin/video-dom',
                    success: function(data) {
                        // end_loader();
                        $('#my-dom').remove();
                        $('#section-dom').append(data['html']);
                    },
                    error: function(error) {
                        // errorDisplay(error["responseJSON"]["message"]);
                    }
                });
            }
        }
    </script>
@endsection
