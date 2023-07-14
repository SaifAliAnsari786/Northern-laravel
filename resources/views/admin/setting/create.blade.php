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
                            <h3>Add Setting</h3>
                            <p class="ms-4">Fill the following fields to add a new setting</p>
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
                                {!! Form::open(['url' => 'super-admin/settings','method' => 'POST', 'files' => true]) !!}
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
                                                                            <option value="{{$index}}">{{$value}}</option>
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
                                                                <label>Title<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                <input type="text" name="key" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                        @foreach(config('custom.status') as $in => $val)
                                                                            <option value="{{$in}}" @if(old('status') == $in) selected @endif>{{$val}}</option>
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
                                                    <a href="{{url('settings')}}">
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

@endsection
@section('script')
    <script>
        function getParagraph() {
            var val = $('#type').val();
            var html = '';
            $('#sentence').remove();
            $('#sentence-nepali').remove();
            $('#paragraph').remove();
            $('#paragraph-nepali').remove();
            $('#image').remove();
            $('#image-alt').remove();
            if(val == 1){
                html += '<div class="col-sm-12 col-md-12 mt-2" id="sentence"> ' +
                            '<div class="form-group batch-form">'+
                                '<div class="col-md-12">'+
                                    '<div class="row">'+
                                        '<div class="col-md-2">'+
                                            '<label>Sentence<span style="color: red;">*</span></label>'+
                                        '</div>'+
                                        '<div class="col-md-9">'+
                                            '<div class="input-group">'+
                                                '<input type="text" class="form-control"   name="value" >'+
                                            '</div>' +
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                // $('#value_section').append(html);
                $( "#my-name" ).after(html);
            }else if(val == 2){

                html += '<div class="col-sm-12 col-md-12 mt-2" id="paragraph"> ' +
                    '<div class="form-group">'+
                    '<div class="col-md-12">'+
                    '<div class="row">'+
                    '<div class="col-md-3">'+
                    '<label>Paragraph<span style="color: red;">*</span></label>'+
                    '</div>'+
                    '<div class="col-md-9">'+
                    '<div class="input-group">'+
                    '<textarea name="value" class="form-control" id="body1"></textarea>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                $('#value_section').append(html);

                $( "#my-name" ).after(html);
                ClassicEditor
                    .create( document.querySelector( '#body1' ),{
                        ckfinder: {
                            uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                        }
                    })
                    .catch( error => {
                        console.error( error );
                    } );
            }else {
                html += '<div class="col-sm-12 col-md-6 mt-2" id="image"> ' +
                    '<div class="form-group batch-form">'+
                    '<div class="col-md-12">'+
                    '<div class="row">'+
                    '<div class="col-md-3">'+
                    '<label>Image <span style="color: red;">*</span></label>'+
                    '</div>'+
                    '<div class="col-md-9">'+
                    '<div class="input-group">'+
                    '<input type="file" class="form-control"   name="image" >'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-sm-12 col-md-6 mt-2" id="image-alt"> ' +
                    '<div class="form-group batch-form">'+
                    '<div class="col-md-12">'+
                    '<div class="row">'+
                    '<div class="col-md-3">'+
                    '<label>Image Alt<span style="color: red;">*</span></label>'+
                    '</div>'+
                    '<div class="col-md-9">'+
                    '<div class="input-group">'+
                    '<input type="text" class="form-control"   name="image_alt" >'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                // $('#value_section').append(html);
                $( "#my-name" ).after(html);
            }
        }
    </script>
@endsection
