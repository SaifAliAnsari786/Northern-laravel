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
                            <h3>Add New Blog</h3>
                            <p class="ms-4 mb-0">Fill the following fields to add new blog.</p>
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
                            {!! Form::open(['url' => 'super-admin/blogs', 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST', 'files' => true, 'onsubmit' => 'return validateForm()']) !!}
                                <div class="form-group batch-form">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="design_title">Name<span style="color: red;">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{old('name')}}" required onchange="validateSlug()">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="type">Blog Type<span style="color: red;">*</span></label>
                                                <select id="type" name="type" class="form-select" aria-label="Select the design type" required>
                                                    <option value="" selected disabled>Please select blog type</option>
                                                    @foreach(config('custom.blog_types') as $in1 => $val1)
                                                        <option value="{{$in1}}" @if(old('type') == $in1) selected @endif>{{$val1}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="design_title">Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg getDate"   name="publish_date" id="publish_date" value="{{old('publish_date')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="reading_time">Reading Time</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="reading_time" id="reading_time" value="{{old('reading_time')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="design_title">Author Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="author_name" id="author_name" value="{{old('author_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="reading_time">Author Position</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="author_position" id="author_position" value="{{old('author_position')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="design_title">Image<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control form-control-lg"   name="image" id="image" value="{{old('image')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="reading_time">Image Alt</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="image_alt" id="image_alt" value="{{old('image_alt')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-12 pt-3 pt-md-0">
                                            <label for="over_view_description">Description<span style="color: red;">*</span></label>
                                            <div id="content" data-image-url="{{route('image.store')}}">

                                            </div>
                                            <textarea name="description" id="content-textarea" style="display: none"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_title" class="form-label">Seo Title</label>
                                            <input class="form-control form-control-lg" type="text" id="seo_title" name="seo_title">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_description" class="form-label">Seo Description</label>
                                            <input class="form-control form-control-lg" type="text" id="seo_description" name="seo_description">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_keyword" class="form-label">Seo Keyword</label>
                                            <input class="form-control form-control-lg" type="text" id="seo_keyword" name="seo_keyword">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label for="seo_keyword" class="form-label">Meta Keyword</label>
                                            <input class="form-control form-control-lg" type="text" id="seo_meta_keyword" name="seo_meta_keyword">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                            <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                                <option value="" selected disabled>Please select status </option>
                                                @foreach(config('custom.status') as $in2 => $val2)
                                                    <option value="{{$in2}}" @if(old('status') == $in2) selected @endif>{{$val2}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-4 submit-section">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                                <i class="fas fa-angle-double-right"></i></button>
                                            <a href="{{url('super-admin/blogs')}}">
                                                <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i class="fa-solid fa-angles-right"></i></button>
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
    <script src="{{asset('admin/js/quill-custom.js')}}"></script>
    <script>
    var myValidatedForm = true;
    function validateSlug() {
        debugger;
       var name = $('#design_title').val();
       if (name != '' || name != null) {
           start_loader();
           var formData = new FormData();
           formData.append('name', name);
           $.ajax({
               type:'POST',
               url:Laravel.url+'/super-admin/blogs/check-slug',
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               dataType: 'json',
               data: formData,
               processData: false,  // tell jQuery not to process the data
               contentType: false,
               success:function (data){
                   end_loader();
                   debugger;
                   if (data['status'] == 'no') {
                       myValidatedForm = false;
                       errorDisplay('This name has been already taken!');
                       $('#design_title').focus();
                   }
               },
               error: function (error){
                   end_loader();
                   debugger
                   errorDisplay('Something went worng !');
               }
           });
       } else {
           errorDisplay('Please enter the home design name!');
           $('#design_title').focus();
       }

    }

    function validateForm() {
        return myValidatedForm;
    }
</script>
@endsection
