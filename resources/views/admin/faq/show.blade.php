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
                            <h3>Show FAQ's</h3>
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
                            <div class="form-group batch-form">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="design_title">Questions<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"   name="question" id="question" value="{{$setting->question}}" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="design_type">Status<span style="color: red;">*</span></label>
                                            <select id="status" name="status" class="form-select" aria-label="Select the status" disabled>
                                                <option value="" selected disabled>Please select status</option>
                                                @foreach(config('custom.status') as $in1 => $val1)
                                                    <option value="{{$in1}}" @if($setting->status == $in1) selected @endif>{{$val1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-12 pt-3 pt-md-0">
                                        <label for="over_view_description">Answer<span style="color: red;">*</span></label>
                                        <textarea name="answer" id="answer"
                                                  rows="15">{!! $setting->answer !!}
                                            </textarea>
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
