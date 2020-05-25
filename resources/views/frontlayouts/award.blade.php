<section class="inner-content-area">
                <div class="container">
                    <div class="row mb--10 mb-md--60">
                        <div class="col-lg-9 order-lg-2">
                            <div class="row mb--50">
                                <div class="col-12">
                                    <h2 class="heading__secondary-2 font-weight-normal">Honors & Awards</h2>
                                    <p>We are proud of what we have done. Let our Honors & Awards speak for us!</p>
                                </div>
                            </div>
                            <div class="row">
                            @foreach($shows_awards_details as $awards)
                                <div class="col-md-6 mb--50">
                                    <div class="award-item">
                                        <div class="award-item__icon">
                                            <div class="icon icon-rounded icon-big icon-hover-2">
                                                <i class="pe-7s-cup bg--primary"></i>
                                            </div>
                                        </div>
                                        <h2 class="award-item__title">{{$awards->year}} {{$awards->title}}</h2>
                                        <p>{{$awards->award}}</p>
                                        <img src="{{asset('images/profile_pictures/'.$awards->image)}}" alt="Award Image">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3 order-lg-1">
                            <aside class="sidebar">
                                <div class="widget mb--50">
                                    <ul class="widget-menu">
                                        <li><a href="/about">Our Company</a></li>
                                        <li><a href="/career">Careers</a></li>
                                        <li><a href="/history">Our History</a></li>
                                        <li class="active"><a href="/award">Honors &amp; Awards</a></li>
                                        <li><a href="/team">Our Team</a></li>
                                        <li><a href="/faq">F.A.Q</a></li>
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="fp-element-carousel slick-dot-style-2 slick-dot-mb-20"
                                    data-slick-options='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "infinite": true,
                                        "dots": true
                                    }'>
                                    @foreach($display_testimony as $testimony)
                                        <div class="item">
                                            <div class="testimonial testimonial-style-5">
                                                <div class="testimonial__inner">
                                                    <div class="testimonial__text">
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
                            </aside>
                        </div>
                    </div>
                </div>
            </section>