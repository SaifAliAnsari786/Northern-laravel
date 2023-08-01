@extends('layouts.app')
@section('content')
<main>

    <section class="banner-section ndsworking-banner">
        <div class="container">
           <div class="banner-content inner-banner">
            <h1>Working at NDS</h1>
            <p>Fill in your details below and we will respond to your enquiry within one business day.</p>
            <ul class="breadcrumb">
                <li><a href="./">Home</a></li>
                <li><i class="icofont-long-arrow-right"></i></li>
                <li>Working at NDS</li>
            </ul>
           </div>
        </div>
    </section>

    <section class="form-page">
        <div class="container">
            <form action="{{ url('workingatNDS') }}" method="post" name="form" id="form" enctype="multipart/form-data">
                @csrf
                <div class="enquiry-section">
                    <h5 class="enquiry-top" style="text-align: center;">Register Your Interest</h5>
                </div>
                <div class="one-columns">
                    <div class="col">
                        <div class="enquiry-input">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="two-columns">
                    <div class="col">
                        <div class="enquiry-input">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_no" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="enquiry-input">
                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="two-columns">
                    <div class="col">
                        <div class="enquiry-section" style="margin-bottom:40px;">
                            <h5 class="enquiry-top" style="border-bottom: 1px solid #ccc; padding-bottom:0;">Areas of Interest</h5>
                        </div>
                        <div class="two-columns">
                            <div class="col">
                                <div class="service-select">
                                    <ul class="service-list">
                                        <li>
                                            <input type="checkbox" name="check[]" value="Support_Workers">
                                            <label>Support Workers</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check[]" value="Support_Coordination">
                                            <label>Support Coordination</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check[]" value="Client_Relationship_Management">
                                            <label>Client Relationship Management</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="service-select">
                                    <ul class="service-list">
                                        <li>
                                            <input type="checkbox" name="check[]" value="Business_Development">
                                            <label>Business Development</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check[]" value="People_and_Culture">
                                            <label>People and Culture</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" name="check[]" value="Finance">
                                            <label>Finance</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="enquiry-section" style="margin-bottom:40px;">
                            <h5 class="enquiry-top" style="border-bottom: 1px solid #ccc; padding-bottom:0;">Anything Else to Share?</h5>
                            <div class="textarea">
                                <textarea rows="2" name="message" placeholder="Is there anything else you would like to share with us?"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="cols">
                        <label for="avatar">Upload Your Approved Plan</label>
                        <input type="file" id="" name="image" multiple="" required>
                    </div>
                </div>
                <div class="cols" style="margin-top:30px;">

                    <div class="cols" style="text-align: center; margin-top:16px;">
                        <div class="btn">
                            <button type="submit" name="submit">SEND NOW</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
</main>

@endsection
