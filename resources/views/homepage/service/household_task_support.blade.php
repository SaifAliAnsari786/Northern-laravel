@extends('layouts.app')
@section('content')
<main>
        <section class="banner-section household-banner">
            <div class="container">
               <div class="banner-content inner-banner">
                <h1>{{$household_tasks->background_title}}</h1>
                <p>{!! $household_tasks->background_image_description !!}</p>
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
                            <img src="{{ asset('images/services/' . $household_tasks->service_image) }}" alt="{{ $household_tasks->service_image_alt }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-one-section">
                            <h2>{{$household_tasks->title}}</h2>
                            <p>{!!  $household_tasks->service_image_description !!}</p>
                            
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
                            <img src="frontend/images/cleaning.svg">
                        </div>
                        <div class="support-three-content-dls">
                            <p>Cleaning</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-three-images-dls">
                            <img src="frontend/images/laundry.svg">
                        </div>
                        <div class="support-three-content-dls">
                            <p>Laundry</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-three-images-dls">
                            <img src="images/shopping.svg">
                        </div>
                        <div class="support-three-content-dls">
                            <p>Shopping</p>
                        </div>
                    </div>
                </div>
                <div class="three-columns">
                    <div class="col">
                        <div class="support-three-images-dls">
                            <img src="frontend/images/meal-preparations.svg">
                        </div>
                        <div class="support-three-content-dls">
                            <p>Dishwashing</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-three-images-dls">
                            <img src="frontend/images/yard-maintenance.svg">
                        </div>
                        <div class="support-three-content-dls">
                            <p>Yard Maintenance</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
