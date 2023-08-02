@extends('layouts.app')
@section('content')
    <main>
        <section class="banner-section household-banner">
            <div class="container">
                <div class="banner-content inner-banner">
                    <h1>Gallery</h1>
                    <ul class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li><i class="icofont-long-arrow-right"></i></li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="photo-section">
            <div class="container">
                <div class="photo-detail">
                    <div id="London" class="tabcontent">
                        <div class="three-columns gallery-items">
                            <div class="col">
                                <div class="photo-wrap">
                                    <a href="{{ asset('images/services/' . $respite_care->service_image) }}"
                                        data-fancybox="lightbox1">
                                        <img src="{{ asset('images/services/' . $respite_care->service_image) }}"
                                            alt="img-description">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="photo-wrap">
                                    <a href="{{ asset('images/services/' . $daily_living_support->service_image) }}"
                                        data-fancybox="lightbox1">
                                        <img src="{{ asset('images/services/' . $daily_living_support->service_image) }}"
                                            alt="img-description">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="photo-wrap">
                                    <a href="{{ asset('images/services/' . $support_coordination->background_image) }}"
                                        data-fancybox="lightbox1">
                                        <img src="{{ asset('images/services/' . $support_coordination->background_image) }}"
                                            alt="img-description">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
