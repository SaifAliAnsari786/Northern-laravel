@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section dailyliving-banner">
        <div class="container">
            <div class="banner-content">
                <h1>{{$setting->title}}</h1>
                <p>{!! $setting->background_image_description !!}</p>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><i class="icofont-long-arrow-right"></i></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>
    @if($setting->description_image_position == 2)
    <section class="support-one">
        <div class="container">
            <div class="two-columns">
                <div class="col">


                    <div class="image-wrapper">
                        <img src="{{  asset('images/services/' .$setting->service_image) }}" alt="{{ $setting->service_image_alt }}">
                    </div>
                </div>
                <div class="col">
                    <div class="support-one-section">
                        <h2>{{$setting->title}}</h2>
                        <p> {!! $setting->service_image_description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="support-one">
        <div class="container">
            <div class="two-columns">
                <div class="col">
                    <div class="support-one-section">
                        <h2>{{$setting->title}}</h2>
                        <p>{!! $setting->service_image_description !!}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="image-wrapper">
                        <img src="{{  asset('images/services/' .$setting->service_image) }}" alt="{{ $setting->service_image_alt }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif



    <section class="support-three-dls">
        <div class="container">
            <div class="four-columns">
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/bathroom.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Bathroom/Showering</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/meal-preparations.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Meal Preparations</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/grooming.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Grooming</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/domestic-support.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Domestic Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($setting->form == 1)
    <section class="banner-form">
       
        <div class="container">
            <div class="two-columns">
                <div class="col request-left-text">
                    <div class="left-side">
                        <h1>Start Your Journey</h1>
                        <p>Start Living Independently Today. Our Door is always open for you, share your interest with us.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="right-side">
                        <h3>Request a Callback</h3>
                        <p>We'll give you a call to discuss how we can support you.</p>
                        <form method="post" action="{{ url('serviceform') }}">
                        @csrf
                            <div class="form-section-side">
                                <div class="two-columns">
                                    <div class="col">
                                        <input type="text" placeholder="Your Name" name="name" id="name" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Your phone number" name="phone_no" id="phone" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Your email" name="email" id="email" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Postcode" name="postcode" id="postcode">
                                    </div>
                                </div>
                                <div class="one-columns">
                                    <div class="cols">
                                        <select name="state" id="state">
                                            <option>Select your state</option>
                                            <option value="qld">QLD</option>
                                            <option value="nsw">NSW</option>
                                            <option value="sa">SA</option>
                                            <option value="act">ACT</option>
                                            <option value="vic">VIC</option>
                                        </select>
                                    </div>
                                    <div class="cols">
                                        <input type="text" name="fund" id="fund" placeholder="Do you have access to funded supports?"required>
                                    </div>
                                    <div class="cols">
                                        <input type="text" name="service" id="service" placeholder="What services or supports are you interested in?"required>
                                    </div>
                                    <div class="cols">
                                        <textarea rows="2" name="message" id="message" placeholder="Is there anything else you would like to share with us?"></textarea>
                                    </div>
                                    <div class="cols">
                                        <button class="request-btn">Request a Callback</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @elseif ($setting->description_image_position == 2)
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection