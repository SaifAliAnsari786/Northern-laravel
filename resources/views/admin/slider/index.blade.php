@extends('admin.layouts.app')
@section('title')
    <title>Sliders</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        {{-- start loader --}}
        <div class="loader loader-default" id="loader"></div>
        {{-- end loader --}}
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Slider Lists</h4>
                                <p>
                                    You can search the slider by <a href="#" class="card-heading-link">name</a> and can
                                    view all available sliders records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{ url('super-admin') }}" class="card-heading-link">Home</a></li>
                                <li>Slider</li>
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
                                        <h3>Slider's Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{ url('super-admin/sliders/create') }}"><i
                                                class="fa-solid fa-book-open"></i>&nbsp;&nbsp Add Slider</a>
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
                                                                <th scope="col">Sliders</th>
                                                                <th scope="col">Order By</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            @foreach ($settings as $setting)
                                                                <tr>
                                                                    <td>{{ $settings->firstItem() + $loop->index }}</td>
                                                                    <td>
                                                                        @if ($setting->type == 1)
                                                                            <a href="{{ url($setting->image) }}"
                                                                                target="_blank">
                                                                                <img src="{{ url($setting->image) }}"
                                                                                    alt="" style="width: 100px;">
                                                                            </a>
                                                                        @else
                                                                            Video
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <select name="order_by" class="form-control"
                                                                            id="slider{{ $setting->id }}"
                                                                            onchange="updateOrder({{ $setting->id }})">
                                                                            @for ($i = 1; $i <= $orderBys; $i++)
                                                                                <option value="{{ $i }}"
                                                                                    @if ($i == $setting->order_by) selected @endif>
                                                                                    {{ $i }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ config('custom.status')[$setting->status] }}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                    href="{{ url('super-admin/sliders/' . $setting->id . '/edit') }}"
                                                                                    role="button"><i
                                                                                        class="fa-solid fa-pen"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-title="Edit"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                    href="{{ url('super-admin/sliders/delete/' . $setting->id) }}"
                                                                                    role="button"><i
                                                                                        class="fa-solid fa-trash"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-title="Delete"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="pagination-section">
                                                            {{ $settings->links() }}
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
        function updateOrder(sliderId) {
            $.confirm({
                title: 'Do you sure want to change order?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'change',
                        btnClass: 'btn-red',
                        action: function() {
                            var orderBy = $('#slider' + sliderId).val();
                            var formData = new FormData();
                            formData.append('slider_id', sliderId);
                            formData.append('order_by', orderBy);
                            start_loader();
                            //start ajax call
                            $.ajax({
                                /* the route pointing to the post function */
                                type: 'POST',
                                url: Laravel.url + "/super-admin/sliders/change-order",
                                dataType: 'json',
                                data: formData,
                                processData: false, // tell jQuery not to process the data
                                contentType: false,
                                /* remind that 'data' is the response of the AjaxController */
                                success: function(data) {
                                    end_loader();
                                    location.reload();

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
