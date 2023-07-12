@extends('admin.layouts.app')
@section('title')
    <title>Setting</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--start loader--}}
            <div class="loader loader-default" id="loader"></div>
            {{--end loader--}}
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Show Setting</h3>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/settings')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
{{--                                {!! Form::open(['url' => 'settings/'.$setting->id,'method' => 'POST', 'files' => true]) !!}--}}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Type <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select  id="type" class="form-control" name="type" required onchange="getParagraph()">
                                                                        <option value="" selected disabled>Please select Type</option>
                                                                        @foreach(config('custom.setting_types') as $index => $value)
                                                                            <option value="{{$index}}" @if($setting->type == $index) selected @endif>{{$value}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Name<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"  id="inputPassword3" name="key" required value="{{$setting->key}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($setting->type == 1)
                                                <div class="col-sm-12 col-md-12 mt-2" id="sentence">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Sentence<span style="color: red;">*</span></label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"   name="value" required value="{{$setting->value}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($setting->type == 2)
                                                <div class="col-sm-12 col-md-12 mt-2" id="paragraph">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Paragraph<span style="color: red;">*</span></label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <textarea name="value" class="form-control" id="body1">{!! $setting->value !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($setting->type == 3)
                                                <div class="col-sm-12 col-md-6 mt-2" id="image">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Image <span style="color: red;">*</span></label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input type="file" class="form-control"   name="value" required>
                                                                    </div>
                                                                    <br>
                                                                    <span style="margin-left: 100px;">
                                                                            <a href="{{url($setting->value)}}" target="_blank">
                                                                                <img src="{{url($setting->value)}}" alt="" style="width: 100px;">
                                                                            </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 mt-2" id="image-alt">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Image Alt<span style="color: red;">*</span></label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"   name="image_alt" value="{{$setting->image_alt}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-sm-12 col-md-6 mt-4" id="my-name">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Status <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select  id="status" name="status" class="form-control" required>
                                                                        <option value="" selected disabled>Please select Status</option>
                                                                        @foreach(config('custom.status') as $in1 => $val1)
                                                                            <option value="{{$in1}}" @if($setting->status == $in1) selected @endif>{{$val1}}</option>
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
                                </div>
{{--                                {!! Form::close() !!}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
