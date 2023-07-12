<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('title')
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    {{ Html::favicon($favicon->value) }}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Nunito&family=Nunito+Sans&family=Roboto+Flex:opsz,wght@8..144,200&family=Roboto:wght@100&display=swap"
        rel="stylesheet">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    {!! Html::style('admin/css/custom-admin.css') !!}
    <!-- {!! Html::style('admin/css/style.css') !!} -->
    {!! Html::style('admin/css/navigation.css') !!}
    {!! Html::style('admin/css/bootstrap-multiselect.css') !!}
    {!! Html::style('admin/vendors/mdi/css/materialdesignicons.min.css') !!}
    {!! Html::style('admin/plugins/flatpickr/dist/flatpickr.min.css') !!}
    {{--css for loader--}}
    {!! Html::style('admin/css/css-loader.css') !!}
    {{--    for dispalying confirmation--}}
    {!! Html::style('admin/confirm/jquery-confirm.min.css') !!}

    {{--start select 2 style    --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    {{--end select 2 style    --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @yield('style')
</head>
<body>
@if(Auth::user())
    @include('admin.layouts.menubar')
    @include('admin.layouts.sidebar')
@endif
@yield('content')

{!! Html::script('admin/js/jquery-3.6.0.slim.min.js') !!}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
{!! Html::script('admin/vendors/js/vendor.bundle.base.js') !!}
{!! Html::script('admin/js/misc.js') !!}
{!! Html::script('admin/plugins/flatpickr/dist/flatpickr.js') !!}
{!! Html::script('admin/confirm/jquery-confirm.min.js') !!}

{{--start select 2 script    --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--end select 2 script    --}}
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

{{-- slick slider js --}}
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Include the Quill library -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{!! Html::script('admin/js/summernote-image-attributes.js') !!}



<script>
    Laravel = {
        'url': '{{url("")}}'
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".getDate").flatpickr({
        dateFormat: "Y-m-d"
    });
    $(".myDate").flatpickr({
        dateFormat: "Y-m-d",
        defaultDate: "<?php echo date('Y-m-d');?>",
    });


    $(".currentDate").flatpickr({
        maxDate: "<?php echo date('Y-m-d');?>",
        dateFormat: "Y-m-d",
    });
    $(".futureDate1").flatpickr({
        minDate: "<?php echo date('Y-m-d');?>",
        dateFormat: "Y-m-d H:i",
    });

    //time picker
    $("#time_picker").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minuteIncrement: 1
    });

    //starting loader
    function start_loader() {
        $('#loader').addClass('is-active');
    }

    //ending loader
    function end_loader() {
        $('#loader').removeClass('is-active');
    }

    //select2 initialization
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        $(".js-tags").select2({
            tags: true
        });

        $('.my-multiple-select2').select2();
    });


    //displaying success message
    function successDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }

    //displaying error message
    function errorDisplay(title) {
        $.confirm({
            title: title,
            content: false,
            type: 'red',
            typeAnimated: true,
            buttons: {
                close: function () {
                }
            }
        });
    }

    function filterList() {
        debugger;
        var baseurl = window.location.origin + window.location.pathname;
        debugger;
        window.location = baseurl + '?' + $('#search').serialize();
    }

    function filterList2() {
        var baseurl = window.location.origin + window.location.pathname;
        window.location = baseurl + '?' + $('#search2').serialize();
    }

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    function getReset(url) {
        var url1 = Laravel.url + '/' + url;
        location.replace(url1)
    }

    function getResetLink(url, url2, id) {
        var url1 = Laravel.url + '/' + url + '/' + url2 + '/' + id;
        location.replace(url1)
    }

    ClassicEditor
        .create(document.querySelector('#body'), {})
        .catch(error => {

        });


    $('.timesheet-nav').slick({
        draggable: true,
        accessibility: false,
        variableWidth: true,
        slidesToShow: 1,
        appendArrows: $('.indicators'),
        prevArrow: '<i class="fa-solid fa-circle-chevron-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa-solid fa-circle-chevron-right" aria-hidden="true"></i>',
        swipeToSlide: true,
        infinite: false
    });
</script>
@include('admin.layouts.sidebar_js')

@yield('script')
</body>
</html>
