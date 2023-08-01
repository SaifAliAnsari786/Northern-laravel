
@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section dailyliving-banner">
        <div class="container">
           <div class="banner-content">
            <h1>{{$service_image_description->title}}</h1>
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><i class="icofont-long-arrow-right"></i></li>
                <li>Services</li>
            </ul>
           </div>
        </div>
    </section>
    <section class="support-one">
        <div class="container">
            <div class="two-columns">
                <div class="col">
                    <div class="image-wrapper">
                        <img src="{{  asset('images/services/' .$service_image->service_image) }}" alt="{{ $service_image->service_image_alt }}">
                    </div>
                </div>
                <div class="col">
                    <div class="support-one-section">
                        <h2>{{$service_image_description->title}}</h2>
                        <p> {!!  $service_image_description->service_image_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="support-three-dls">
        <div class="container">
            <div class="four-columns">
                @foreach ( $serviceDescriptions as $serviceDescription )
                    <div class="col">
                        <div class="support-three-images-dls">
                            <img src="{{ url($serviceDescription->image) }}">
                        </div>
                        <div class="support-three-content-dls">
                            <p>{{ $serviceDescription->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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
                        <form  method="post" action="" >
                        <div class="form-section-side">
                            <div class="two-columns">
                                <div class="col">
                                    <input type="text" placeholder="Your Name" name="name" id="name" required>
                                </div>
                                <div class="col">
                                    <input type="text" placeholder="Your phone number" name="phone" id="phone" required>
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
                                        <option>QLD</option>
                                        <option>NSW</option>
                                        <option>SA</option>
                                        <option>ACT</option>
                                        <option>VIC</option>
                                    </select>
                                </div>
                                <div class="cols">
                                    <input type="text" name="fund" id="fund" placeholder="Do you have access to funded supports?">
                                </div>
                                <div class="cols">
                                    <input type="text" name="service" id="service" placeholder="What services or supports are you interested in?">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
