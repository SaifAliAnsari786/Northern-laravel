<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Northern Disability Services | Best NDIS Registered Providers</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/favicon.ico">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Open Graph meta tags -->
        <meta property="og:title" content="Northern Disability Services | Best NDIS Registered Providers" />
        <meta property="og:url" content="https://northds.org/" />
        <meta property="og:description" content="We are NDIS Registered Service Providers In Australia, Melbourne, offering several support services to individuals living with a disability." />
        <meta property="og:image" content="https://northds.org/images/banner-slider2.jpg" />
        <meta property="og:image:alt" content="ndis registered providers">
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="Northern Disability Services" />
        <meta name="keywords" content="ndis registered providers" />
        <meta name="meta keywords" content="ndis provider, ndis approved providers, ndis registered service providers, registered providers ndis, ndis provider, ndis provider services, ndis provider melbourne, ndis service provider melbourne, ndis registered providers melbourne, best ndis registered service providers, top ndis registered service providers" data-rh="true"/>
        <meta name="author" content="Northern Disability Services" />
        <meta name="description" content="We are NDIS Registered Service Providers In Australia, Melbourne, offering several support services to individuals living with a disability." />
        <meta name="subject" content="Northern Disability Services">
        <meta name="publisher" content="Northern Disability Services">
        
        <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q4KL0HF1KX"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-Q4KL0HF1KX'); </script>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <!--slider-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <link href="{{ ('frontend/css/header.css') }}" rel="stylesheet">
    <link href="{{ ('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ ('frontend/css/footer.css') }}" rel="stylesheet">
    <link href="{{ ('frontend/css/top.css') }}" rel="stylesheet">
    <link href="{{ ('frontend/css/home.css') }}" rel="stylesheet">

    <body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    </body>
    <script>
    $(document).ready(function() {
  $('.not-human, .triangle').hide();
  $('.verify').addClass('disabled');
  
  function human(e) {
    if ($('.checkbox-text').hasClass('robot')) {
      return;
    }
    else {
        $('.checkbox-text').text("You're human!").css("color", "green").addClass('human');
        $('.checkbox').addClass('disabled');
        $('.checkbox').click(function(e) {
        e.preventDefault();
        });
    }
    
    $('.not-human, .triangle').slideUp();
  }
  
  function robot(event) {
    if ($('.checkbox-text').hasClass('human')) {
      return;
    }
    else {
      $('.checkbox-text').text("ROBOT").css("color", "red").addClass('robot');
      $('.checkbox').addClass('disabled');
      $('.checkbox').click(function(event) {
        event.preventDefault();
      });
    
      $('.not-human, .triangle').slideDown();
    }
  }
  
  $('.checkbox').click(function() {
    if ($('.checkbox').is(":checked")) {
      $(document).mousemove(function() {
        window.setTimeout(function() {
          human();
        }, 250);
      });
      
      window.setTimeout(function() {
        robot();
      }, 1000);
    };
  });
  
  $('.captcha-code').keyup(function(event) {
    if ($('.captcha-code').val().length <= 0) {
      $('.verify').addClass('disabled');
    }
    else {
      $('.verify').removeClass('disabled');
    };
  });
  
  $('.verify').click(function() {
    if ($('.captcha-code').val() == "captcha code") {
      $('.checkbox-text').removeClass('robot').addClass('human');
      $('.not-human, .triangle').slideUp();
    }
  });
});
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=M0JiBHYn"></script>
</script>
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
  </head>