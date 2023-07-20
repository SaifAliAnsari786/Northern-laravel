<section class="banner">
    <div class="slider image-slider">
        @foreach ($sliders as $slider)
        <div class="image-wrap"style="background-image: url({{ $slider->image }})">
            <div class="container">
                <div class="banner-text">
                    <h1>{{ $slider->main_heading }}</h1>
                    <p>{{ $slider->description }}</p>
                    <a href="#" class="btn">Get in Touch</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
