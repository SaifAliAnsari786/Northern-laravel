<section class="mission-section">
            <div class="container">
                <div class="two-columns d-flex">
                    <div class="col">
                        <div class="mission-img">
                            <img src="{{url($northern_disability_service_image->value)}}" alt="{{$northern_disability_service_image->image_alt}}">
                        </div>
                    </div>
                    <div class="col">
                        
                        <div class="mission-wrap">
                            <h3>{{$northern_disability_service->key}}</h3>
                            <button onclick="responsiveVoice.speak('{{$northern_disability_service->key}}');responsiveVoice.speak('NDS is a leading disability support organisation.');responsiveVoice.speak('Our innovative support services enable and celebrate the achievements of the amazing people we work with. We are committed to maximise the quality of life of our participants and support them achieve their full potential.Our commitment is to provide choice and flexibility. We are committed to offer services that are person centered and responsive to your personal goals.');" type="button" value="Play"><i class="icofont-listening" class="listen"></i></button>
                            {!!  $northern_disability_service->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>