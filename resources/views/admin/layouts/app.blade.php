<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
{{--    {{ Html::favicon($favicon->value) }}--}}
    {{--      @vite('resources/js/app.js')--}}
    @yield('title')
    {{--    Bootstrap CSS--}}
    {!! Html::style('bootstrap-5.1.3-dist\css\bootstrap.min.css') !!}
    {{-- fontawesome   --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    {{--    Google fonts--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Nunito&family=Nunito+Sans&family=Roboto+Flex:opsz,wght@8..144,200&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    {!! Html::style('admin/css/navigation.css') !!}
    {!! Html::style('admin/plugins/flatpickr/dist/flatpickr.min.css') !!}
    {{--css for loader--}}
    {!! Html::style('admin/css/css-loader.css') !!}
    {{--    for dispalying confirmation--}}
    {!! Html::style('admin/confirm/jquery-confirm.min.css') !!}

    {{--start select 2 style    --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    {{--end select 2 style    --}}
    {!! Html::style('admin/css/custom-admin.css') !!}
    @yield('style')

</head>
<body>
@if(Auth::user())
    @include('admin.layouts.menubar')
    @include('admin.layouts.sidebar')
@endif
@yield('content')
{!! Html::script('admin/js/jquery-3.6.4.min.js') !!}
{!! Html::script('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') !!}
{!! Html::script('admin/plugins/flatpickr/dist/flatpickr.js') !!}
{!! Html::script('admin/confirm/jquery-confirm.min.js') !!}
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/default.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>

{{--start select 2 script    --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
{{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
{{--<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--{!! Html::script('admin/js/quill-image-resize.js') !!}--}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

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
        var url1 = Laravel.url + '/super-admin/' + url;
        location.replace(url1)
    }

    function getResetLink(url, url2, id) {
        var url1 = Laravel.url + '/' + url + '/' + url2 + '/' + id;
        location.replace(url1)
    }
</script>
@include('admin.layouts.sidebar_js')
@yield('script')
</body>
</html>
