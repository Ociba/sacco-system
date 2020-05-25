<section class="testmonial-area bg-image pt--75 pb--80 mb--80" data-bg-image="{{asset('assets/img/bg/service_single_14.jpg')}}">
                <div class="container">
                    <div class="row mb--40">
                        <div class="col-12 text-center">
                            <h2 class="color--white">Why They Choose Us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="fp-element-carousel slick-dot-mb-30"
                            data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "dots": true
                            }'
                            data-slick-responsive= '[
                                {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                            @foreach($display_testimony as $testimony)
                                        <div class="item">
                                            <div class="testimonial">
                                                <div class="testimonial__inner">
                                                    <div class="testimonial__text text-white">
                                                        <p>“{{$testimony->message}}”</p>
                                                    </div>
                                                    <div class="testimonial__author">
                                                        <figure class="testimonial__author--img">
                                                            <img src="{{asset('images/profile_pictures/'.$testimony->image)}}" alt="Testimonial Author">
                                                        </figure>
                                                        <div class="testimonial__author--info">
                                                            <h4 class="testimonial__author--name">{{$testimony->name}}</h4>
                                                            {{--<span class="testimonial__author--role">Customer</span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>