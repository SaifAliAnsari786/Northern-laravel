@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section support-banner">
        <div class="container">
           <div class="banner-content inner-banner">
            <h1>{{$support_coordinations->title}}</h1>
            <p>{!! $support_coordinations->background_image_description !!}</p>
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
                    <div class="support-one-section">
                        <h2>{{$support_coordinations->title}}</h2>
                        <p>{!! $support_coordinations->service_image_description !!}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/services/' . $support_coordinations->service_image) }}" alt="{{ $support_coordinations->service_image_alt }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="support-three">
        <div class="container">
            <div class="support-three-heading">
                <h3>What can our Support Coordinator do for you?</h3>
            </div>
            <div class="three-columns support-cor">
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/image-one.png" alt="NDS Support">
                    </span>
                    <span class="support-three-content">
                        <p>Assist you to get the supports in your plan started</p>
                    </span>
                </div>
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/image-two.png" alt="NDS Main Services">
                    </span>
                    <span class="support-three-content">
                        <p>Work with you to find mainstream services for you to access such as employment and education</p>
                    </span>
                </div>
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/services-link.png" alt="NDS Service link">
                    </span>
                    <span class="support-three-content">
                        <p>Ensure that you are linked in to services you want and/or need</p>
                    </span>
                </div>
            </div>
            <div class="three-columns support-cor">
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/image-four.png" alt="NDS Services">
                    </span>
                    <span class="support-three-content">
                        <p>Work with you to develop skills and resilience</p>
                    </span>
                </div>
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/image-five.png" alt="Parenting Training">
                    </span>
                    <span class="support-three-content">
                        <p>Parenting training</p>
                    </span>
                </div>
                <div class="col">
                    <span class="support-three-images">
                        <img src="frontend/images/image-six.png" alt="Respond crisis">
                    </span>
                    <span class="support-three-content">
                        <p>Respond to crisis</p>
                    </span>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
