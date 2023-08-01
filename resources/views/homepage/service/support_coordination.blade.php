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

    <section class="support-three">
        <div class="container">
            <div class="support-three-heading">
                <h3>What can our Support Coordinator do for you?</h3>
            </div>
            <div class="three-columns support-cor">
                @foreach ($support_coordinationDatas as $support_coordinationData )
                <div class="col">
                    <span class="support-three-images">
                        <img src="{{ url($support_coordinationData->image) }}" alt="NDS Support">
                    </span>
                    <span class="support-three-content">
                        <p>{{ $support_coordinationData->title }}</p>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
