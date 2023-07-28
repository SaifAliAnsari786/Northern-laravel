@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section about-banner">
        <div class="container">
            <div class="banner-content">
                <h1>About Us</h1>
                <ul class="breadcrumb">
                    <li><a href="./">Home</a></li>
                    <li><i class="icofont-long-arrow-right"></i></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="contactus-section">
        <div class="container">
            <div class="head">
                <h1>{{$northern_disability_service->key}}</h1>
            </div>
            <div class="para" style="max-width:100%;">
                <p>{!! $nds_description->value !!}</p>
                
            </div>
        </div>
    </div>

    <section class="ourvalues-section">
        <div class="container">
            <div class="ourvalues-heading">
                <h1>Our Values</h1>
            </div>
            <div class="three-columns">
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="images/ourvalues-icon1.png" alt="Empowerment">
                        </div>
                        <div class="block-para">
                            <h3>Empowerment</h3>
                            <p>We ensure people have the necessary information to make informed choices and where an individual has difficulty in making decisions themselves we work closely with their family and carers to achieve the best outcome for them.</p>
                        </div>
                    </div>
                </div>
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="images/integrity.png" alt="integrity">
                        </div>
                        <div class="block-para">
                            <h3>Integrity</h3>
                            <p>We help people in need who seek our help. We are honest, trustworthy and transparent in our dealings with service users and stakeholders.</p>
                        </div>
                    </div>
                </div>
                <div class="col npmb">
                    <div class="block">
                        <div class="block-icon">
                            <img src="images/inclusiveness.png" alt="Inclusiveness">
                        </div>
                        <div class="block-para">
                            <h3>Inclusiveness</h3>
                            <p>We respect all people. We provide opportunities for meaningful participation to those who seek our help.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flag-section">
        <div class="container">
            <div class="flag-heading">
                <div class="flag-image">
                    <img src="images/torresIslandFlag.jpg">
                </div>
                <div class="flag-image">
                    <img src="images/aboriginalFlag.jpg">
                </div>
            </div>
            <div class="flag-title">
                <h1>Acknowledgement of Country</h1>
            </div>
            <div class="flag-content">
                <p>Northern Disability Service acknowledges and recognises the Australian Aboriginal and Torres Strait Islander peoples as the first inhabitants of the nation and the traditional custodians of the lands where we live, learn and work. We pay our respects to their Elders past and present.</p>
            </div>
        </div>

        <section class="banner-two-section">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="col-one">
                        <div class="text-left">
                            <h2>Start Living Independently Today</h2>
                            <h3>Give us a call to schedule free consultation</h3>
                        </div>
                    </div>
                    <div class="col-two">
                        <div class="text-right">
                            <img class="phone-image" src="images/phone-call.svg"><a href="tel:03-9457-7412">
                                <p>03-9457-7412</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
</section>


@endsection