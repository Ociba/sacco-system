<section class="testimonial-area bg-image pt--95 pb--100 mb--95" data-bg-image="{{asset('assets/img/bg/home01_b2.jpg')}}">
                <div class="container">
                    <div class="row mb--40">
                        <div class="col-12 text-center">
                            <h2 class="color--white">Testimonials</h2>
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
                                {"breakpoint":767, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                            @foreach($display_all_testimonies as $testimonies)
                                <div class="item">
                                    <div class="testimonial">
                                        <div class="testimonial__inner">
                                            <div class="testimonial__text">
                                                <p>“{{$testimonies->message}}”</p>
                                            </div>
                                            <div class="testimonial__author">
                                                <figure class="testimonial__author--img">
                                                    <img src="{{asset('images/profile_pictures/'.$testimonies->image)}}" alt="Testimonial Author">
                                                </figure>
                                                <div class="testimonial__author--info">
                                                    <h4 class="testimonial__author--name">{{$testimonies->name}}</h4>
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
                    <a href="/testify" button class="btn btn-primary text-center">Send us Testimony</button></a>
                </div>
            </section>