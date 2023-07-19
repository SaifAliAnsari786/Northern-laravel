@extends('layouts.app')

@section('content')


<body>

        <section class="banner">
            <div class="slider image-slider">
                <div>
                    <div class="image-wrap" style="background-image: url('frontend/images/banner-slider2.jpg');">
                        <div class="container">
                            <div class="banner-text">
                                <h1>NDS is a Leading Disability Support Organisation</h1>
                                <p>Our commitment is to provide choice and flexibility. We are committed to offer services that are person centered and responsive to your personal goals.</p>
                                <a href="#" class="btn"> Get in Touch</a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div>
                    <div class="image-wrap" style="background-image: url('frontend/images/Slider2.jpg');">
                        <div class="container">
                            <div class="banner-text">
                                <h1>We Provide Respite Care</h1>
                                <p>We can provide respite care on an occasional or as needed basis , and in all kinds of situations – wether your usual carer will be at home with your or not.</p>
                                <a href="#" class="btn"> Get in Touch</a>
                            </div>
                        </div>                          
                    </div>
                </div>
                <div>
                    <div class="image-wrap" style="background-image: url('frontend/images/banner-slider1.jpg');">
                        <div class="container">
                            <div class="banner-text">
                                <h1>We make it Simple</h1>
                                <p>As a registered NDIS service provider, we offer the best disability services tailored to your needs.</p>
                                <a href="#" class="btn"> Get in Touch</a>
                            </div>
                        </div>                          
                    </div>
                </div>
            </div>
        </section>

        <section class="process-section">
            <div class="container">
                 <button onclick="responsiveVoice.speak('We Support NDIS logos');responsiveVoice.speak('How can we help you?');responsiveVoice.speak('Our innovative support services enable and celebrate the achievements of the amazing people we work with. We are committed to maximise the quality of life of our participants and support them achieve their full potential. Our commitment is to provide choice and flexibility.');" type="button" value="Play"><i class="icofont-listening"></i>Listen</button>
                @foreach($settings as $setting)
                    <div class="two-columns">
                        <div class="col nds-hblock-wrap">
                            <div class="nds-hblock">
                                <img src="{{ ('frontend/images/nds-provider.png') }}" alt="I love NDIS. Registered NDIS Provider">
                                <h6 class="ndsub-heading">{{$setting->key}}</h6>
                                <p>Our innovative support services enable and celebrate the achievements of the amazing people we work with. As registered NDIS service providers, we are committed to maximise the quality of life of our participants and supporting them achieve their full potential. We are committed to providing the best choice and flexibility in our disability care services.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="nds-himg">
                                <img src="{{ (($setting->value)) }}" alt="NDS Art" class="img-fluid">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="service-section">
            <div class="container">
                <div class="three-columns">
                    <div class="col">
                        <a href="daily-living-support">
                            <div class="service-detail">
                            <div class="icon-section">
                                <img src="images/daily-living-support.svg" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Daily Living Support</h4>
                                <p>We will support you with your daily living needs.</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="support-coordination">
                            <div class="service-detail">
                                <div class="icon-section">
                                    <img src="images/support-coordination.svg" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Support Coordination</h3>
                                    <p>Our support coordinators will assist you get the best out of your NDS Plan.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="community-participation">
                            <div class="service-detail">
                                <div class="icon-section">
                                    <img src="images/community-participation.svg" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Community Participation</h3>
                                    <p>We will assist you get involved in community and social activities.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="plan-management">
                            <div class="service-detail">
                                <div class="icon-section">
                                    <img src="images/plan-management.svg" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Plan Management</h3>
                                    <p>Choosing us as your plan manager saves you hours of time and the headache of endless admin.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="household-tasks">
                            <div class="service-detail">
                                <div class="icon-section">
                                    <img src="images/household-tasks.svg" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Household Tasks</h3>
                                    <p>We can support you with the household task if you are having challenges in keeping your home clean and well-maintained.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="respite-care">
                            <div class="service-detail">
                                <div class="icon-section">
                                    <img src="images/respite-care.svg" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Respite Care</h3>
                                    <p>We can provide respite care on an occasional or as needed basis.</p>
                                </div>
                            </div>
                        </a>   
                    </div>
                </div>
                <!--<a href="service.php" class="btn">View all Services</a>-->
            </div>
        </section>

        <section class="mission-section">
            <div class="container">
                <div class="two-columns d-flex">
                    <div class="col">
                        <div class="mission-img">
                            <img src="images/mission-img.jpg" alt="disable person">
                        </div>
                    </div>
                    <div class="col">
                        
                        <div class="mission-wrap">
                            <h3>Northern Disability Services</h3>
                            <button onclick="responsiveVoice.speak('Northern Disability Services');responsiveVoice.speak('NDS is a leading disability support organisation.');responsiveVoice.speak('Our innovative support services enable and celebrate the achievements of the amazing people we work with. We are committed to maximise the quality of life of our participants and support them achieve their full potential.Our commitment is to provide choice and flexibility. We are committed to offer services that are person centered and responsive to your personal goals.');" type="button" value="Play"><i class="icofont-listening" class="listen"></i></button>
                            <p class="sub-heading">NDS is a leading disability support organisation.</p>
                            <p>Our innovative support services facilitate and celebrate the accomplishments of the remarkable people we work with. We are NDIS registered service providers in Australia, Melbourne, offering several support services to individuals living with a disability.
                            </p>
                            <p>Our commitment is to provide the best NDIS disability care services. We are dedicated to delivering the best disability care services in Melbourne that are person-centered and meet your personal goals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="help-section">
            <div class="container">
                <div class="two-columns">
                    <div class="col payment-block" style="padding: 0; background:#fce7d6;">
                        <div class="pricing">
                            
                            <h3>NDIS Pricing</h3>
                            <button onclick="responsiveVoice.speak('NDIS Pricing');responsiveVoice.speak('NDS’s costing for NDIS funded supports are identical to the Temporary Transformation Payment (TTP) prices set and regulated by the National Disability Insurance Agency (NDIA.)');" type="button" value="Play"><i class="icofont-listening" class="listen"></i></button>
                            <p>NDS's costing for NDIS funded supports are identical to the Temporary Transformation Payment (TTP) prices set and regulated by the National Disability Insurance Agency (NDIA.)</p>
                            <p>For details on the prices of services provided by NDS please see the following link:</p>
                            
                            <ul>
                                <li><a class="btn" href="https://www.ndis.gov.au/providers/pricing-arrangements" target="_blank">Price Guide</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col" style="padding:0;">
                        <div class="image-help">
                            <img src="images/payment.jpg" alt="NDS Payment">
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        
        <section class="banner-section testi-banner" style="position: relative;">
            <div class="container">
                <div class="destination-slider">
                    <div>
                        <div class="banner-content testimonial">
                            <p class="quote">I don't think that I will ever be able to find the words to express my deep gratitude to you for all that you have done for me and continue to do. You are, quite literally, my lifesaver.</p>
                            <h4>Linda Roberts, Wood Worker</h4>
                        </div>
                    </div>
                    <div>
                        <div class="banner-content testimonial">
                            <p class="quote">You have been a great help to me. I’m grateful for the amazing employees you have provided. Thank you.</p>
                            <h4>Thomas Wells</h4>
                        </div>
                    </div>
                    <div>
                        <div class="banner-content testimonial">
                            <p class="quote">Thank you for your great service. One of the Best NDIS registered service providers in Melbourne.</p>
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
                            <p>Getting quality Home Care with NDS is easier than ever. Let us treat your loved ones like family!</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-section">
                            <input type="text" name="name" class="text" placeholder="Email Address">
                            <a href="#" class="btns">Submit</a>
                            <p><input type="checkbox" class="form-control">&nbsp;&nbsp;I have read and agree to the terms & conditions</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
</div>
@endsection

</body>

</html>
