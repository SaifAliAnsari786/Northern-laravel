@extends('layouts.app')
@section('content')
<main>
    <section class="banner-section contact-banner">
        <div class="container">
           <div class="banner-content inner-banner">
            <h1>Contact</h1>
            <P>Contact us today to arrange free, no-obligation care consultation for you or your loved one.</P>
            <ul class="breadcrumb">
                <li><a href="./">Home</a></li>
                <li><i class="icofont-long-arrow-right"></i></li>
                <li>Contact</li>
            </ul>
           </div>
        </div>
    </section>
    <section class="map-section">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.708997848163!2d145.06929201531486!3d-37.67954507977686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6491f8a428be5%3A0xafb29ffd32ad8a4f!2s214%2F12%20Ormond%20Blvd%2C%20Bundoora%20VIC%203083%2C%20Australia!5e0!3m2!1sen!2snp!4v1686812611513!5m2!1sen!2snp" width="100%" height="422" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="map-location">
            <ul class="location-service">
                <li>
                    <h2>Address</h2>
                    <!--<p class="map">7 Tobruk Ave, Heidelberg West<br> VIC 3081, Australia</p>-->
                    <p class="map">214/12 Ormond Boulevard, Bundoora, VIC 3083</p>
                </li>
                <li>
                    <h2>Phone</h2>
                    <p class="phone">03- 9457 7412 <span>(24/7 Available)</span></p>
                    <!--<p><strong>24/7 Available</strong></p>-->
                </li>
                <li>
                    <h2>General Enquiry:</h2>
                    <p class="email">info@northds.org</p>
                </li>
                <li>
                    <h2>Invoice:</h2>
                    <p class="email">accounts@northds.org</p>
                </li>
            </ul>
        </div>
    </section>
    <div class="contactus-section">
        <div class="container">
            <!-- <div class="head">
                <h1>Contact Us</h1>
            </div> -->
            <div class="para">
                <p>Contact us today to arrange free, no-obligation care consultation for you or your loved one.</p>
                <p>Please fill out the form below. Our caring, capable, knowledgeable team are ready and willing to answer any questions or concerns you may have and will get back to you shortly.</p>
            </div>
        </div>
    </div>
    <form action="{{ url('contact') }}" name="form" id="form" method="POST">
        @csrf
        <div class="form-detail">
            <div class="container">
                    <div class="form-control">
                            <div class="two-columns">
                                <div class="col">
                                    <input type="text" placeholder=" First Name" name="first_name" id="fname" required>
                                </div>
                                <div class="col">
                                    <input type="text" placeholder="Last Name" name="last_name" id="lname" required>

                                </div>
                            </div>
                            <div class="two-columns">
                                <div class="col" style="position:relative;">
                                    <input type="text" placeholder="Email" name="email" id="email" onkeyup="validation()" required>
                                    <span class="error" id="text"></span>
                                </div>
                                <div class="col" style="position:relative;">
                                    <input type="text" placeholder="Phone Number" name="phone_no" id="phone" onkeyup="validation1()" required>
                                    <span class="error" id="text1"></span>
                                </div>
                            </div>
                            <div class="one-columns">
                                <div class="col">
                                    <textarea placeholder="Message" name="message" id="message"></textarea>
                                </div>
                            </div>
                            <div class="agreement">
                                <input type="checkbox" required><span style="margin-left:10px;">I agree that my submitted data is being collected and stored.</span>
                            </div>
                            <div class="submit-button">
                                <button class="btn" style="border:none;" name="submit">Submit</button>
                            </div>
                    </div>
            </div>
        </div>
    </form>
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
