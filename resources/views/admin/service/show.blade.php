@extends('admin.layouts.app')
@section('title')
<title>Service</title>
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
                        <h3>Show Service</h3>
                        <div class="tbl-buttons">
                            <ul>
                                <li>
                                    <a href="{{url('super-admin/service')}}"><img src="{{url('frontend/cancel-icon.png')}}" alt="cancel-icon" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('success.success')
                    @include('errors.error')
                    <div class="row p-4">
                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                            {{-- {!! Form::open(['url' => 'service/'.$service->id,'method' => 'POST', 'files' => true]) !!}--}}
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <div class="row pt-2">
                                        <div class="col-md-4">
                                            <label for="title">Title </label>
                                            <input class="form-control form-control-lg my-image" type="text" id="" name="title" placeholder="Enter Title" value="{{ $service->title }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="logo">Logo <span class="text-danger">*</span></label>
                                            <input type="file" name="logo" class="form-control" id="logo" accept="image/png, image/jpeg" />
                                            <img src="{{ asset('images/services/'. $service->logo) }}" height="80" width="100">

                                        </div>

                                        <div class="col-md-4">
                                            <label for="logo_image_alt">Logo Image Alt </label>
                                            <input type="text" class="form-control" name="logo_image_alt" placeholder="Enter Logo Image Alt" value="{{ $service->logo_image_alt }}">
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="description">Description<span style="color: red;">*</span></label>
                                            <textarea name="description" id="body1" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $service->description !!}</textarea>
                                        </div>

                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-4">
                                            <label for="background_title">Background Title </label>
                                            <input class="form-control form-control-lg my-image" type="text" id="" name="background_title" placeholder="Enter Background Title" value="{{ $service->background_title }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="background_image">Background Image <span class="text-danger">*</span></label>
                                            <input type="file" name="background_image" class="form-control" id="background_image" accept="image/png, image/jpeg" />
                                            <img src="{{ asset('images/services/'. $service->background_image) }}" height="80" width="100">

                                        </div>

                                        <div class="col-md-4">
                                            <label for="background_image_alt">Background Image Alt </label>
                                            <input type="text" class="form-control" name="background_image_alt" placeholder="Enter Background Image Alt" value="{{ $service->background_image_alt }}">
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="background_image_description">Background Image description<span style="color: red;">*</span></label>
                                            <textarea name="background_image_description" id="body2" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $service->background_image_description !!}</textarea>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="seo_title" class="form-label">Description Image Position</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio1" value="1" @if ($service->description_image_position==1) checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Right</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="description_image_position" id="inlineRadio2" value="2" @if ($service->description_image_position==2) checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">Left</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="service_image">Service Image <span class="text-danger">*</span></label>
                                            <input type="file" name="service_image" class="form-control" id="service_image" accept="image/png, image/jpeg" />
                                            <img src="{{ asset('images/services/'. $service->service_image) }}" height="80" width="100">

                                        </div>

                                        <div class="col-md-4">
                                            <label for="service_image_alt">Service Image Alt</label>
                                            <input type="text" class="form-control" name="service_image_alt" placeholder="Enter Service Image Alt" value="{{ $service->service_image_alt }}">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="service_image_description">Service Image description<span style="color: red;">*</span></label>
                                            <textarea name="service_image_description" id="body3" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $service->service_image_description !!}</textarea>
                                        </div>


                                        <div class="col-sm-6">
                                            <label for="seo_title" class="form-label">Form</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form" id="inlineRadio1" value="1" @if($service->form==1) checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="form" id="inlineRadio2" value="2" @if($service->form==2) checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>




                                </div>



                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_title" class="form-label">Seo Title</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title" value="{{$service->seo_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="seo_description" class="form-label">Seo Description</label>
                                        <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description" value="{{$service->seo_description}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <input class="form-control form-control-lg" type="text" id="meta_keyword" name="meta_keyword" value="{{$service->meta_keyword}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="meta_keyword_description" class="form-label">Meta Keyword Description</label>
                                        <input class="form-control form-control-lg" type="text" id="meta_keyword_description" name="meta_keyword_description" value="{{$service->meta_keyword_description}}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                        <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status</option>
                                            @foreach(config('custom.status') as $in2 => $val2)
                                            <option value="{{$in2}}" @if($service->status == $in2) selected @endif>{{$val2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- {!! Form::close() !!}--}}
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
            
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body2'), {
              
             
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body3'), {
        
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body4'), {
            
        })
        .catch(error => {
            console.error(error);
        });

        
</script>

@endsection