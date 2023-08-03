@extends('admin.layouts.app')
@section('title')
    <title>Contact List</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="card-wrap form-block p-0">
                    <div class="block-header p-4">
                        <h3>Show Contact</h3>
                        <div class="tbl-buttons">
                            <ul>
                                <li>
                                    <a href="{{url('super-admin/contact')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row p-4 form-wrap">
                        <div class="form-group batch-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mt-1">
                                        <label for="design_title">First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{$contact->first_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="design_title">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{$contact->last_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="design_title">Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{$contact->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="design_title">Phone</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"   name="name" id="design_title" value="{{$contact->phone_no}}" readonly>
                                        </div>
                                    </div>
                                    
                            <div class="row mt-3">
                                <div class="col-12 col-md-12 pt-3 pt-md-0">
                                    <label for="over_view_description">Message</label>
                                    <textarea name="over_view_description" id="body1"
                                              rows="15">{!! $contact->message !!}
                                    </textarea>
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
            .create( document.querySelector( '#body1' ))
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

