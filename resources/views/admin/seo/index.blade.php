@extends('admin.layouts.app')
@section('title')
    <title>SEO</title>
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
                                <h4>Seo Lists</h4>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
                                <li>SEO</li>
                            </ul>
                        </div>
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>SEO's Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('super-admin/seo/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp Add SEO</a>
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
                                                            <th scope="col">Page Name</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr id="my-table-tr-{{$setting->id}}">
                                                                <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                <td>{{config('custom.seo_types')[$setting->seo_type]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item"  href="{{url('super-admin/seo/'.$setting->id)}}" role="button"><i class="fa-solid fa-eye" data-bs-toggle="tooltip" data-bs-title="Show"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item"  href="{{url('super-admin/seo/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen" data-bs-toggle="tooltip" data-bs-title="Edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item"  role="button" onclick="deleteHomeDesign({{$setting->id}})"><i class="fa-solid fa-trash" data-bs-toggle="tooltip" data-bs-title="Delete"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="pagination-section">
                                                            {{$settings->links()}}
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
                            action: function () {
                                // Get the value of the checked checkbox
                                var formData = new FormData();
                                formData.append('id', id);
                                start_loader();
                                //start ajax call
                                $.ajax({
                                    /* the route pointing to the post function */
                                    type: 'POST',
                                    url: Laravel.url + "/super-admin/seo-delete",
                                    dataType: 'json',
                                    data: formData,
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,
                                    /* remind that 'data' is the response of the AjaxController */
                                    success: function (data) {
                                        end_loader();
                                        $('#my-table-tr-'+id).remove();
                                    },
                                    error: function (error) {
                                        end_loader();
                                    }
                                });
                                //end ajax call
                            }
                        },
                        close: function () {
                        }
                    }
                });
        }
    </script>
@endsection
