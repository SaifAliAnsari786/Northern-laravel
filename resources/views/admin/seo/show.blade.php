@extends('admin.layouts.app')
@section('title')
    <title>SEO</title>
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
                            <h3>Show SEO</h3>
                            <p class="ms-4 mb-0">Fill the following fields to edit new SEO.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/seo')}}"><img src="{{url('frontend/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            <div class="form-group batch-form">
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_type" class="form-label">SEO Type<span style="color: red;">*</span></label>
                                        <select id="seo_type" name="seo_type" class="form-select" aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status </option>
                                            @foreach(config('custom.seo_types') as $in2 => $val2)
                                                <option value="{{$in2}}" @if($setting->seo_type == $in2) selected @endif>{{$val2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_title" class="form-label">Seo Title<span style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title" required value="{{$setting->seo_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_description" class="form-label">Seo Description<span style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description" required value="{{$setting->seo_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Seo Keyword<span style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="seo_keyword" name="seo_keyword" required value="{{$setting->seo_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Meta Keyword<span style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg" type="text" id="seo_meta_keyword" name="seo_meta_keyword" required value="{{$setting->seo_meta_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="seo_keyword" class="form-label">Image</label>
                                        <input class="form-control form-control-lg" type="file"  name="image">
                                        @if($setting->image != null)
                                            <span>
                                                <img src="{{url($setting->image)}}" alt="" style="width: 100px;">
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="seo_keyword" class="form-label">Image Alt</label>
                                        <input class="form-control form-control-lg" type="text"  name="image_alt" value="{{$setting->image_alt}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

