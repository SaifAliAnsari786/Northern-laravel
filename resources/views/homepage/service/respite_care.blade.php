@extends('layouts.app')
@section('content')
<main>
        <section class="banner-section respite-banner">
            <div class="container">
               <div class="banner-content inner-banner">
                <h1>{{$respite_cares->background_title}}</h1>
                <P>{!! $respite_cares->background_image_description !!}</P>
                <ul class="breadcrumb">
                    <li><a href="./">Home</a></li>
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
                        <div class="image-wrapper imgheight-auto">
                            <img src="{{ asset('images/services/' . $respite_cares->service_image) }}" alt="{{ $respite_cares->service_image_alt }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-one-section">
                            <h2>{{$respite_cares->title}}</h2>
                            <p>{!!  $respite_cares->service_image_description !!}</p>
                            
                        </div>
                    </div>
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
                            <form action="" method="post" name="form" id="form">
                            <div class="form-section-side">
                                <div class="two-columns">
                                    <div class="col">
                                        <input type="text" placeholder="Your Name" name="name" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Your phone number" name="phone" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Your email" name="email" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" placeholder="Postcode" name="postcode">
                                    </div>
                                </div>
                                <div class="one-columns">
                                    <div class="cols">
                                        <select name="state">
                                            <option>Select your state</option>
                                            <option>QLD</option>
                                            <option>NSW</option>
                                            <option>SA</option>
                                            <option>ACT</option>
                                            <option>VIC</option>
                                        </select>
                                    </div>
                                    <div class="cols">
                                        <input type="text" name="fund" placeholder="Do you have access to funded supports?">
                                    </div>
                                    <div class="cols">
                                        <input type="text" name="service" placeholder="What services or supports are you interested in?">
                                    </div>
                                    <div class="cols">
                                        <textarea rows="2" name="message" placeholder="Is there anything else you would like to share with us?"></textarea>
                                    </div>
                                    <div class="cols">
                                        <button class="request-btn" name="submit">Request a Callback</button>
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
