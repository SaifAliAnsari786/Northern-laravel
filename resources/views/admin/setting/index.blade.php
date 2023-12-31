@extends('admin.layouts.app')
@section('title')
<title>Settings</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Settings Lists</h4>
                            <p>
                                You can search the setting by <a href="#" class="card-heading-link">name or slug, status</a> and can view all available settings records.
                            </p>
                        </div>
                        <ul class="admin-breadcrumb">
                            <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
                            <li>Setting</li>
                        </ul>
                    </div>
                    {!! Form::open(['url' => 'super-admin/settings', 'method' => 'GET']) !!}
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="filter-btnwrap justify-content-between">
                                    <div class="d-flex">
                                        <div class="input-group mx-4">
                                            <span>
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="text" class="form-control reset-class" placeholder="Search by Name or slug" name="name" value="{{old('name')}}" />
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
                                    <h3>Setting's Table</h3>
                                </div>
                                <div class="add-button">
                                    <a class="nav-link" href="{{url('super-admin/settings/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp Add Setting</a>
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
                                                            <th style="width: 10px">S.N.</th>
                                                            <th class="text-center">Title</th>
                                                            <th class="text-center">Slug</th>
                                                            <th class="text-center">Type</th>
                                                            <th class="text-center">Value</th>
                                                            <th class="text-center">Image Alt</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                        <tr>
                                                            <td>{{$settings->firstItem() + $loop->index}}</td>
                                                            <td class="text-center">{{$setting->key}}</td>
                                                            <td class="text-center">{{$setting->slug}}</td>
                                         
                                                            <td class="text-center">{{config('custom.setting_types')[$setting->type]}}</td>
                                                            @if($setting->type == array_search('Image',config('custom.setting_types')))
                                                                    <td>
                                                                    <a href="{{url($setting->value)}}" target="_blank">
                                                                    <img src="{{ url($setting->value) }}" alt="" style="width: 100px;">
                                                                    </a>
                                                                    </td>
                                                                @else
                                                                    <td>{!! Str::limit($setting->value,100,'......') !!}</td>
                                                                @endif

                                                                
                                                            <td class="text-center">{{$setting->image_alt}}</td>

                                                            <td class="text-center">
                                                                {{config('custom.status')[$setting->status]}}
                                                            </td>
                                                            <td class="action-icons">
                                                                <ul class="icon-button d-flex">
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{url('super-admin/settings/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{url('super-admin/settings/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen" data-bs-toggle="tooltip" data-bs-title="Edit"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('super-admin/settings/delete/' . $setting->id) }}"
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