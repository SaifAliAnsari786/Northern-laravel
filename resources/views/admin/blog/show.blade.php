@extends('admin.layouts.app')
@section('title')
    <title>Blog</title>
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
                            <h3>{{$setting->name}}</h3>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/blogs')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            <div class="form-group batch-form">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="design_title">Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{$setting->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="type">Blog Type</label>
                                            <select id="type" name="type" class="form-select" aria-label="Select the design type" required>
                                                <option value="" selected disabled>Please select blog type</option>
                                                @foreach(config('custom.blog_types') as $in1 => $val1)
                                                    <option value="{{$in1}}" @if($setting->type == $in1) selected @endif>{{$val1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg getDate"   name="publish_date" id="publish_date" value="{{$setting->publish_date}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reading_time">Reading Time</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="reading_time" id="reading_time" value="{{$setting->reading_time}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Author Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="author_name" id="author_name" value="{{$setting->author_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reading_time">Author Position</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="author_position" id="author_position" value="{{$setting->author_position}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg"   name="image" id="image" value="{{old('image')}}">
                                            <span><img src="{{url($setting->image)}}" alt="" width="100px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reading_time">Image Alt</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="image_alt" id="image_alt" value="{{$setting->image_alt}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-12 pt-3 pt-md-0">
                                        <label for="over_view_description">Description</label>
                                        <div id="content" data-image-url="{{route('image.store')}}">
                                            {!! $setting->description !!}

                                        </div>
                                        <textarea name="description" id="content-textarea" style="display: none">{!! $setting->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_title" class="form-label">Seo Title</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title" value="{{$setting->seo_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_description" class="form-label">Seo Description</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description" value="{{$setting->seo_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Seo Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_keyword" name="seo_keyword" value="{{$setting->seo_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_meta_keyword" name="seo_meta_keyword" value="{{$setting->seo_meta_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status </option>
                                            @foreach(config('custom.status') as $in2 => $val2)
                                                <option value="{{$in2}}" @if($setting->status == $in2) selected @endif>{{$val2}}</option>
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
@endsection
@section('script')
    <script src="{{asset('admin/js/quill-custom.js')}}"></script>
@endsection
