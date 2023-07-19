<section class="help-section">
            <div class="container">
                <div class="two-columns">
                    <div class="col payment-block" style="padding: 0; background:#fce7d6;">
                        <div class="pricing">
                            
                            <h3>{{$ndis_pricing->key}}</h3>
                            <button onclick="responsiveVoice.speak('{{$ndis_pricing->key}}');responsiveVoice.speak('NDS’s costing for NDIS funded supports are identical to the Temporary Transformation Payment (TTP) prices set and regulated by the National Disability Insurance Agency (NDIA.)');" type="button" value="Play"><i class="icofont-listening" class="listen"></i></button>
                            <p>{!!  $ndis_pricing->value !!}</p>
                            
                            
                            <ul>
                                <li><a class="btn" href="https://www.ndis.gov.au/providers/pricing-arrangements" target="_blank">Price Guide</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col" style="padding:0;">
                        <div class="image-help">
                            <img src="{{url( $ndis_pricing_image->value)}}" alt="{{$ndis_pricing_image->image_alt}}">
                        </div>
                    </div>
                </div> 
            </div>
        </section>