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
                @foreach ($community_participationDatas as $community_participationData)
                <div class="col">
                    <div class="support-three-images-dls">
                        <img src="{{ url($community_participationData->image) }}">
                    </div>
                    <div class="support-three-content-dls">
                        <p>{{ $community_participationData->title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
