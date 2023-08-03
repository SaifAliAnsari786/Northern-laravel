@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section service-banner" style="background-image: url('{{($footer_service->value)}}'); background-size: cover; background-position: center;">
        <div class="container">
           <div class="banner-content inner-banner">
            <h1>{{$footer_service->key}}</h1>
            <p>{!! $footer_description->value !!}</p>
            <ul class="breadcrumb">
                <li><a href="./index.php">Home</a></li>
                <li><i class="icofont-long-arrow-right"></i></li>
                <li>Services</li>
            </ul>
           </div>
        </div>
    </section>
    <section class="service-section">
        <div class="container">
            <div class="three-columns">
                @foreach($services as $service)
                    <div class="col">
                        <a href="{{url($service->slug)}}">
                            <div class="service-detail">
                            <div class="icon-section">
                                <img src="{{ asset('images/services/' . $service->logo) }}" alt="{{ $service->logo_image_alt }}">
                            </div>
                            <div class="service-content">
                                <h3>{{$service->title}}</h4>
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
