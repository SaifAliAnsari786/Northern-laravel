@extends('layouts.app')
@section('content')
<main>
<section class="banner-section" style="background-image: url('{{ url($enquiry->value) }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="banner-content inner-banner">
            <h1>{{ $enquiry->key }}</h1>
            <p>{!! $enquiry_description->value !!}</p>
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="icofont-long-arrow-right"></i></li>
                <li>Enquiry Now</li>
            </ul>
        </div>
    </div>
</section>
<section class="form-page">
<div class="container">
    <div class="form-page-head">
        <h5>Contact Details</h5>
        <p>Fill in your details below and we will respond to your enquiry within one business day.</p>
    </div>
    <form action="{{ url('form') }}" method="post" name="form" id="form" enctype="multipart/form-data">
    @csrf
        <div class="two-columns">
            <div class="col">
                <div class="enquiry-input">
                    <select name="participant_fund" class="form-control" required>
                        <option>Participant have a current NDIS plan or access to funding?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Enquirer's Name" name="enquirer_name" required>
                </div>
            </div>
            <div class="col" style="position:relative;">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Enquirer's phone number" id="phone" name="phone_no" onkeyup="validation1()" required>
                    <span class="error" id="text1"></span>
                </div>
            </div>
            <div class="col" style="position:relative;">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Enquirer's email" id="email" name="email" onkeyup="validation()" required>
                    <span class="error" id="text"></span>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Participant's Name" name="participant_name" required>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Participant's Age" name="participant_age" required>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <select class="form-control" name="participant_gender" required>
                        <option>Participant's Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Prefer not to answer</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Participant's disability type" name="participant_disability_type" required>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Participant's Suburb" name="participant_suburb">
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <input type="text" class="form-control" placeholder="Postcode" name="postcode">
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <select class="form-control" name="state">
                        <option>State</option>
                        <option value="qld">QLD</option>
                        <option value="nsw">NSW</option>
                        <option value="sa">SA</option>
                        <option value="act">ACT</option>
                        <option value="vic">VIC</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="enquiry-input">
                    <select class="form-control" name="heard">
                        <option>How you heard about us?</option>
                        <option value="family">Family</option>
                        <option value="friends">Friends</option>
                        <option value="ndis">NDIS</option>
                        <option value="google">Google</option>
                        <option value="facebook">Facebook</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="enquiry-section" style="margin-bottom:40px;">
            <h5 class="enquiry-top" style="border-bottom: 1px solid #ccc; padding-bottom:0;">Service Type</h5>
        </div>
        <div class="four-columns">
            <div class="col">
                <div class="service-select">
                    <label class="lab">Core Support</label>
                    <ul class="service-list">
                        <li>
                            <input type="checkbox" name="core_support[]" value="Community_Access">
                            <label>Community Access</label>
                        </li>
                        <li>
                            <input type="checkbox" name="core_support[]" value="Self_Care_Support">
                            <label>Self Care Support</label>
                        </li>
                        <li>
                            <input type="checkbox" name="core_support[]" value="Transport">
                            <label>Transport</label>
                        </li>
                        <li>
                            <input type="checkbox" name="core_support[]" value="Respite">
                            <label>Respite</label>
                        </li>
                        <li>
                            <input type="checkbox" name="core_support[]" value="Sleepover">
                            <label>Sleepover</label>
                        </li>
                        <li>
                            <input type="checkbox" name="core_support[]" value="Supported_independent_living">
                            <label>Supported independent living</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="service-select">
                    <label class="lab">Capacity building supports</label>
                    <ul class="service-list">
                        <li>
                            <input type="checkbox" name="capacity_building_supports[]" value="Mentoring/Peer_Support">
                            <label>Mentoring/Peer Support</label>
                        </li>
                        <li>
                            <input type="checkbox" name="capacity_building_supports[]" value="Skill_Development">
                            <label>Skill Development</label>
                        </li>
                        <li>
                            <input type="checkbox" name="capacity_building_supports[]" value="Life_Transition">
                            <label>Life Transition</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="service-select">
                    <label class="lab">Coordination</label>
                    <ul class="service-list">
                        <li>
                            <input type="checkbox" name="coordination[]" value="Support_Coordination">
                            <label>Support Coordination</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="service-select">
                    <label class="lab">Plan Management</label>
                    <ul class="service-list">
                        <li>
                            <input type="checkbox" name="plan_management[]" value="Supported_independent_living">
                            <label>Supported independent living</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="enquiry-section" style="margin-bottom:40px;">
            <h5 class="enquiry-top" style="border-bottom: 1px solid #ccc; padding-bottom:0;">Anything Else to Share</h5>
        </div>
        <div class="cols">
            <div class="textarea">
                <textarea rows="3" placeholder="Is there anything else you would like to share with us?" name="message"></textarea>
            </div>
        </div>
        <div class="cols">
            <label for="avatar">Upload Your Approved Plan</label>
            <input type="file" id="" name="image" multiple required>
        </div>

        <div class="cols" style="text-align: center; margin-top:16px;">
            <div class="btn">
                <button type="submit" name="submit">SEND NOW</button>
            </div>
        </div>
    </form>
</div>
</section>
</main>
@endsection
@section('script')
<script>
    function validation(){
    var form=document.getElementById("form");
    var email=document.getElementById("email").value;
    var text=document.getElementById("text");
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(email.match(pattern)){
    form.classList.add("valid");
    form.classList.remove("invalid");
    text.innerHTML="! Email Address is Valid.";
    text.style.color="#28a745";
    }else{
        form.classList.remove("valid");
        form.classList.add("invalid");
        text.innerHTML="! Enter a valid email address";
    text.style.color="#dc3545";
    }
}
    function validation1(){
    var form=document.getElementById("form");
    var phone=document.getElementById("phone").value;
    var text1=document.getElementById("text1");
    var pattern =/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if(phone.match(pattern)){
    form.classList.add("valid");
    form.classList.remove("invalid");
    text1.innerHTML="! Phone Number is Valid.";
    text1.style.color="#28a745";
    }else{
        form.classList.remove("valid");
        form.classList.add("invalid");
        text1.innerHTML="! Enter valid Phone Number";
    text1.style.color="#dc3545";
    }
}
</script>
@endsection
