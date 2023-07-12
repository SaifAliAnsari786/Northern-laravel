@extends('admin.layouts.app')
@section('title')
    <title>FAQ</title>
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
                            <h3>Add FAQ's</h3>
                            <p class="ms-4 mb-0">Fill the following fields to add new faqs.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('super-admin/faqs')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 form-wrap">
                            {!! Form::open(['url' => 'super-admin/faqs', 'class' =>  'row g-2 ps-2 pe-0 me-0', 'method' => 'POST']) !!}
                            <div class="form-group batch-form">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="question">Questions<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="question" id="question" value="{{old('question')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="design_type">Status<span style="color: red;">*</span></label>
                                            <select id="status" name="status" class="form-select" aria-label="Select the status">
                                                <option value="" selected disabled>Please select status</option>
                                                @foreach(config('custom.status') as $in1 => $val1)
                                                    <option value="{{$in1}}" @if(old('status') == $in1) selected @endif>{{$val1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-12 pt-3 pt-md-0">
                                        <label for="over_view_description">Answer<span style="color: red;">*</span></label>
                                        <textarea name="answer" id="answer"
                                                  rows="15">{{old('answer')}}
                                            </textarea>
                                    </div>
                                </div>
                                <div class="row mt-4 submit-section">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                            <i class="fas fa-angle-double-right"></i></button>
                                        <a href="{{url('super-admin/faqs')}}">
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#answer' ),{
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
