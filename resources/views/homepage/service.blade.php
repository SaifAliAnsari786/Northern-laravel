<section class="service-section">
            <div class="container">
                <div class="three-columns">
                    @foreach($services as $service)
                        <div class="col">
                            <a href="{{url($service->slug)}}">
                                <div class="service-detail">
                                <div class="icon-section">
                                    <img src="{{ asset('images/services/' . $service->logo) }}" alt="{{ $service->logo_image_alt }}">
                                </div>
                                <div class="service-content">
                                    <h3>{{$service->title}}</h4>
                                    <p>{!! $service->description !!}</p>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>