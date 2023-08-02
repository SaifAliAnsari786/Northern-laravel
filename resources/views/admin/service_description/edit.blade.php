@extends('admin.layouts.app')
@section('title')
    <title>Service Description</title>
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
                            <h3>Add Service Description</h3>
                            <p class="ms-4">Fill the following fields to add a new Service Description</p>
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
                                {!! Form::open([
                                    'url' => 'super-admin/service-description-update/' . $setting->id,
                                    'method' => 'POST',
                                    'files' => true,
                                ]) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 mt-2" id="my-name">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Title</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="title" value="{{ $setting->title }}">
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
                                                                <label>Description</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea name="description" id="body1" rows="4">{{$setting->description  }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2" id="image">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Image </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control"
                                                                        name="image">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <span style="margin-left: 100px;">
                                                                @if($setting->image)
                                                                <a href="{{ url($setting->image) }}" target="_blank">
                                                                    <img src="{{ url($setting->image) }}" alt=""
                                                                        style="width: 100px;">
                                                                </a>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2" id="image-alt">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Image Alt<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="image_alt" value="{{ $setting->image_alt }}">
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
                                                    <a href="{{ url('super-admin/service-description') }}">
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
    ClassicEditor
        .create(document.querySelector('#body1'))
        .catch(error => {
            console.error(error);
        });


</script>>
@endsection
