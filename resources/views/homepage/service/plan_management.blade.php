@extends('layouts.app')
@section('content')
<main>
        <section class="banner-section plan-banner">
            <div class="container">
               <div class="banner-content inner-banner">
                <h1>NDS as Your Plan Manager</h1>
                <p>Northern Disability Services as your plan manager saves you hours of time</p>
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
                            <img src="frontend/images/plan-manager.jpg" alt="NDS Plan Management">
                        </div>
                    </div>
                    <div class="col">
                        <div class="support-one-section">
                            <h2>Plan Management</h2>
                            <p>NDS, as one of the best NDIS plan management providers in Melbourne, helps you manage funding in your NDIS plan. Choosing Northern Disability Service as your own "my planmanager" saves you time and the headache of endless admin, such as keeping track of payments, filling records, and managing NDIS funding claims.</p>
                            <p>Our team of expert NDIS plan Managers have extensive personal and professional experience in the disability and community care sectors and are dedicated to providing a better more personalised service.</p>
                            <!-- <p>We support individuals who have a disability or face mental health challenges and need tailored NDIS support coordination in managing a complex range of needs including:</p>
                            <ul class="support-list">
                                <li>Individualised supports in the home and in the community</li>
                                <li>Capacity building</li>
                                <li>Community inclusion services</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="support-three-pm">
            <div class="container">
                <div class="support-three-heading">
                    <h2>Keeping You Informed Every Step of the Way</h2>
                </div>
                <div class="three-columns">
                    <div class="col">
                        <div class="col-wrapper">
                            <h5>1</h5>
                            <h3>Dashboard</h3>
                            <p>Your handy tool to view the balance of budgets, check spending and track the progress of payments to your providers.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-wrapper">
                            <h5>2</h5>
                            <h3>Monthly overviews</h3>
                            <p>We send you a snapshot of your NDIS budgets every month so you can see how much you have left in each category.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-wrapper">
                            <h5>3</h5>
                            <h3>Spending alerts</h3>
                            <p>And if it looks as though you're spending too much or too little, we let you know, so you can stay within budget.</p>
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
                    <div class="col request-left-text">
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
