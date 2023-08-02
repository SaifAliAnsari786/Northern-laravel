@extends('admin.layouts.app')
@section('title')
<title>Services</title>
@endsection
@section('main-panel')
<div class="main-panel">
    {{--start loader--}}
    <div class="loader loader-default" id="loader"></div>
    {{--end loader--}}
    <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Services Lists</h4>
                            <p>
                                You can search the services by <a href="#" class="card-heading-link">name</a> and
                                can view all available designs records.
                            </p>
                        </div>
                        <ul class="admin-breadcrumb">
                            <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
                            <li>Services</li>
                        </ul>
                    </div>
                    {!! Form::open(['url' => 'super-admin/service', 'method' => 'GET']) !!}
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="filter-btnwrap justify-content-between">
                                    <div class="d-flex">
                                        <div class="input-group mx-4">
                                            <span>
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="text" class="form-control reset-class" placeholder="Search by design name" name="name" value="{{old('name')}}" />
                                        </div>
                                        <div class="input-group mx-4">
                                            <span>
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <select name="design_type" id="design_type" class="form-control reset-class">
                                                <option value="" disabled selected> search by design type</option>
                                                @foreach(config('custom.design_types') as $index => $value)
                                                <option value="{{$index}}" @if(old('design_type')==$index) selected @endif>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group mx-4">
                                            <span>
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <select name="status" id="status" class="form-control reset-class">
                                                <option value="" disabled selected> search by status</option>
                                                @foreach(config('custom.status') as $index1 => $value1)
                                                <option value="{{$index1}}" @if(old('status')==$index1) selected @endif>{{$value1}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="filter-group mx-2">
                                            <span>
                                                <img src="{{url('admin/icons/filter-icon.svg')}}" alt="" class="img-flud">
                                            </span>
                                            <button class="fltr-btn" type="submit">Filter</button>
                                        </div>
                                        <div class="refresh-group mx-2">
                                            <a onclick="getReset('{{Request::segment(2)}}')">
                                                <img src="{{url('admin/icons/refresh-top-icon.svg')}}" alt="" class="img-flud">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div>
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4">
                        <div class="card-wrap form-block p-0">
                            <div class="block-header bg-header d-flex justify-content-between p-4">
                                <div class="d-flex flex-column">
                                    <h3>Services Table</h3>
                                </div>
                                <div class="add-button">
                                    <a class="nav-link" href="{{url('super-admin/service/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp Add Services</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                    <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
                                        <div class="row">
                                            <div class="col-12 table-responsive table-details">
                                                <table class="table" id="">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">S.N.</th>
                                                            <th scope="col">Title</th>
                                                            
                                                            <th scope="col">Logo Image</th>
                                                            <th scope="col">Background Image</th>
                                                            <th scope="col">Service Image</th>
                                                            <th scope="col">Slug</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="student_list">
                                                        @foreach($services as $service)
                                                        <tr id="my-table-tr-{{$service->id}}">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{$service->title}}</td>
                                                            

                                                            <td>
                                                                <a href="{{asset('images/services/' . $service->logo)}}" target="_blank">
                                                                    <img src="{{asset('images/services/' . $service->logo)}}" alt="" style="width: 100px;">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{asset('images/services/' . $service->background_image)}}" target="_blank">
                                                                    <img src="{{asset('images/services/' . $service->background_image)}}" alt="" style="width: 100px;">
                                                                </a>
                                                            </td>

                                                            <td>
                                                                <a href="{{asset('images/services/' . $service->service_image)}}" target="_blank">
                                                                    <img src="{{asset('images/services/' . $service->service_image)}}" alt="" style="width: 100px;">
                                                                </a>
                                                            </td>

                                                            <td>{{$service->slug}}</td>

                                                            <td class="text-center">{{config('custom.status')[$service->status]}}</td>
                                                            <td class="action-icons">
                                                                <ul class="icon-button d-flex">
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{url('super-admin/service/'.$service->id)}}" role="button"><i class="fa-solid fa-eye" data-bs-toggle="tooltip" data-bs-title="Show"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{url('super-admin/service/'.$service->id.'/edit')}}" role="button"><i class="fa-solid fa-pen" data-bs-toggle="tooltip" data-bs-title="Edit"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{ url('super-admin/service/delete/' . $service->id) }}"><i class="fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-title="Delete"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{ url('super-admin/service-description')}}/{{ $service->id }}" ><i class="fa fa-plus"></i></a></h3>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="pagination-section">

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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function deleteHomeDesign(id) {
        $.confirm({
            title: 'Do you sure want to delete?',
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function() {
                        // Get the value of the checked checkbox
                        var formData = new FormData();
                        formData.append('id', id);
                        start_loader();
                        //start ajax call
                        $.ajax({
                            /* the route pointing to the post function */
                            type: 'POST',
                            url: Laravel.url + "/super-admin/service-delete",
                            dataType: 'json',
                            data: formData,
                            processData: false, // tell jQuery not to process the data
                            contentType: false,
                            /* remind that 'data' is the response of the AjaxController */
                            success: function(data) {
                                end_loader();
                                $('#my-table-tr-' + id).remove();
                            },
                            error: function(error) {
                                end_loader();
                            }
                        });
                        //end ajax call
                    }
                },
                close: function() {}
            }
        });
    }
</script>
@endsection
