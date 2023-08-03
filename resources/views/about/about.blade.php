@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section about-banner" style="background-image: url('{{($about_us->value)}}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="banner-content">
                <h1>{{$about_us->key}}</h1>
                <ul class="breadcrumb">
                    <li><a href="./">Home</a></li>
                    <li><i class="icofont-long-arrow-right"></i></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="contactus-section">
        <div class="container">
            <div class="head">
                <h1>{{$northern_disability_service->key}}</h1>
            </div>
            <div class="para" style="max-width:100%;">
                <p>{!! $nds_description->value !!}</p>

            </div>
        </div>
    </div>

    <section class="ourvalues-section">
        <div class="container">
            <div class="ourvalues-heading">
                <h1>Our Values</h1>
            </div>
            <div class="three-columns">
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="{{  url($empowerment_image->value) }}" alt="{{ $empowerment_image->image_alt }}">
                        </div>
                        <div class="block-para">
                            <h3>{{$empowerment_image->key}}</< /h3>
                                <p>{!! $empowerment_description->value !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="{{  url($integrity_image->value) }}" alt="{{ $integrity_image->image_alt }}">
                        </div>
                        <div class="block-para">
                            <h3>{{$integrity_image->key}}</< /h3>
                                <p>{!! $integrity_description->value !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="{{  url($inclusiveness_image->value) }}" alt="{{ $inclusiveness_image->image_alt }}">
                        </div>
                        <div class="block-para">
                            <h3>{{$inclusiveness_image->key}}</< /h3>
                                <p>{!! $inclusiveness_description->value !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flag-section">
        <div class="container">
            <div class="flag-heading">
                <div class="flag-image">
                    <img src="{{  url($country->value) }}">
                </div>
                <div class="flag-image">
                    <img src="{{  url($country_logo->value) }}">
                </div>
            </div>
            <div class="flag-title">
                <h1>{{$acknowledgement_country->key}}</h1>
            </div>
            <div class="flag-content">
                <p>{!! $acknowledgement_country->value !!}</p>
            </div>
        </div>
    </section>

        <section class="banner-two-section">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="col-one">
                        <div class="text-left">
                            <h2>Start Living Independently Today</h2>
                            <h3>Give us a call to schedule free consultation</h3>
                        </div>
                    </div>
                    <div class="col-two">
                        <div class="text-right">
                            <img class="phone-image" src="{{ asset('frontend/images/phone-call.svg') }}"><a href="tel:03-9457-7412">
                                <p>03-9457-7412</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
</section>
@endsection
