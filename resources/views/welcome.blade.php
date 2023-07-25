@extends('layouts.app')
@section('content')

    {{--Start section for Slider--}}
    @include('homepage.slider')
    {{--End section for Slider--}}


    <section class="process-section">
        <div class="container">
            <button
                onclick="responsiveVoice.speak('We Support NDIS logos');responsiveVoice.speak('How can we help you?');responsiveVoice.speak('Our innovative support services enable and celebrate the achievements of the amazing people we work with. We are committed to maximise the quality of life of our participants and support them achieve their full potential. Our commitment is to provide choice and flexibility.');"
                type="button" value="Play"><i class="icofont-listening"></i>Listen</button>
            <div class="two-columns">
                <div class="col nds-hblock-wrap">
                    <div class="nds-hblock">
                        <img src="{{ url($authorization_top_image->value) }}" alt="I love NDIS. Registered NDIS Provider">
                        <h6 class="ndsub-heading">{{ $authorization_description->key }}</h6>
                        <p>{!! $authorization_description->value !!}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="nds-himg">
                        <img src="{{ url($authorization_right_image->value) }}"
                            alt="{{ $authorization_right_image->image_alt }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start section for northern disability service-->
    @include('homepage.northern_disabillty_service')
    <!-- end section for northern disability service-->

    <!-- start section for ndis pricing-->
    @include('homepage.ndis_pricing')
    <!-- end section for ndis pricing-->



    <section class="banner-section testi-banner" style="position: relative;">
        <div class="container">
            <div class="destination-slider">
                <div>
                    <div class="banner-content testimonial">
                        <p class="quote">I don't think that I will ever be able to find the words to express my deep
                            gratitude to you for all that you have done for me and continue to do. You are, quite literally,
                            my lifesaver.</p>
                        <h4>Linda Roberts, Wood Worker</h4>
                    </div>
                </div>
                <div>
                    <div class="banner-content testimonial">
                        <p class="quote">You have been a great help to me. I’m grateful for the amazing employees you have
                            provided. Thank you.</p>
                        <h4>Thomas Wells</h4>
                    </div>
                </div>
                <div>
                    <div class="banner-content testimonial">
                        <p class="quote">Thank you for your great service. One of the Best NDIS registered service
                            providers in Melbourne.</p>
                        <h4>Anna Jones</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="community-section">
        <div class="container">
            <div class="two-columns">
                <div class="col">
                    <div class="community-head">
                        <h4>Join Our Community</h4>
                        <p>Getting quality Home Care with NDS is easier than ever. Let us treat your loved ones like family!
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="form-section">
                        <input type="text" name="name" class="text" placeholder="Email Address">
                        <a href="#" class="btns">Submit</a>
                        <p><input type="checkbox" class="form-control">&nbsp;&nbsp;I have read and agree to the terms &
                            conditions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>
    </div>
@endsection
