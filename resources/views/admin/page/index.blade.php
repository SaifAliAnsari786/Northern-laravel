@extends('admin.layouts.app')
@section('title')
    <title>Pages</title>
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
                                <h4>PageLists</h4>
                                <p>
                                    You can search the page by <a href="#" class="card-heading-link">name</a> and can
                                    view all available designs records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
                                <li>Page</li>
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
                                        <h3>Pages's Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('super-admin/pages/create')}}"><i
                                                class="fa-solid fa-book-open"></i>&nbsp;&nbsp Add Page</a>
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
                                                            <th scope="col">Page</th>
                                                            <th scope="col">Section</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr id="my-table-tr-{{$setting->id}}">
                                                                <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                <td>{{$setting->page_name}}</td>
                                                                <td>
                                                                    @if($setting->page_contents->count() > 0)
                                                                        @foreach($setting->page_contents as $pageContent)
                                                                            <li>
                                                                                <a href="{{url('super-admin/pages-section/'.$pageContent->id.'/edit')}}">{{$pageContent->section_name}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">{{config('custom.status')[$setting->status]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                               href="{{url('super-admin/pages/'.$setting->id.'/edit')}}"
                                                                               role="button"><i class="fa-solid fa-pen"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-title="Edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" role="button"
                                                                               onclick="deleteHomeDesign({{$setting->id}})"><i
                                                                                    class="fa-solid fa-trash"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-title="Delete"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                               href="{{url('super-admin/pages-section-create/'.$setting->id)}}"
                                                                               role="button"><i class="fa-solid fa-plus"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-title="Add Section"></i></a>
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
                                url: Laravel.url + "/super-admin/pages-delete",
                                dataType: 'json',
                                data: formData,
                                processData: false,  // tell jQuery not to process the data
                                contentType: false,
                                /* remind that 'data' is the response of the AjaxController */
                                success: function (data) {
                                    end_loader();
                                    $('#my-table-tr-' + id).remove();
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
