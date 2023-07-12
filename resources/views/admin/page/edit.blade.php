@extends('admin.layouts.app')
@section('title')
    <title>Page</title>
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
                            <h3>Edit Page</h3>
                            <p class="ms-4 mb-0">Fill the following fields to edit page.</p>
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
                            {!! Form::open(['url' => 'super-admin/pages/'.$setting->id, 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true, 'onsubmit' => 'return validateForm()']) !!}
                            <div class="form-group batch-form">
                                {{-- <div class="col-md-12"> --}}
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Page Name<span
                                                style="color: red;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" name="page_name"
                                                   id="page_name" value="{{$setting->page_name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="design_description">Page Description</label>
                                        <textarea name="page_description" id="page_description" cols="30"
                                                  rows="5" class="form-control form-control-lg"
                                                  placeholder="">{!! $setting->page_description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="design_title">Page Image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="page_image"
                                                   id="page_image" value="{{old('page_image')}}">
                                            @if(file_exists($setting->image))
                                                <span><img src="{{url($setting->page_image)}}" alt=""></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="design_title">Image Alt</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"
                                                   name="page_image_alt"
                                                   id="page_image_alt" value="{{$setting->page_image_alt}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_title" class="form-label">Seo Title</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_title"
                                               name="seo_title" value="{{$setting->seo_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_description" class="form-label">Seo Description</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_description"
                                               name="seo_description" value="{{$setting->seo_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Seo Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_keyword"
                                               name="seo_keyword" value="{{$setting->seo_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_meta_keyword"
                                               name="seo_meta_keyword" value="{{$setting->seo_meta_keyword}}">
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
                                                        @if($setting->status == $in2) selected @endif>{{$val2}}</option>
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
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#page_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
