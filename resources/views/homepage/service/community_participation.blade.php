@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section community-banner">
        <div class="container">
           <div class="banner-content inner-banner">
            <h1>{{$support_communities->title}}</h1>
            <p>{!! $support_communities->background_image_description !!}</p>
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
                    <div class="image-wrapper">
                        <img src="{{ asset('images/services/' . $support_communities->service_image) }}" alt="{{ $support_communities->service_image_alt }}">
                    </div>
                </div>
                <div class="col">
                    <div class="support-one-section">
                        <h2>{{$support_communities->title}}</h2>
                        <p>{!! $support_communities->service_image_description !!}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="support-three-dls">
        <div class="container">
            <div class="three-columns">
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/attending-appointments.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Attending Appointments</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/sports-and-leisure-activities.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Sports and Leisure activities</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/shopping.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Going Shopping</p>
                    </div>
                </div>
            </div>
            <div class="three-columns" style="margin-top:5px">
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/attending-events.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Attending events</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/skill-development.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Skill Development</p>
                    </div>
                </div>
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="frontend/images/taking-public-transport.svg">
                    </div>
                    <div class="support-three-content-dls">
                        <p>Taking Public Transport</p>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection
