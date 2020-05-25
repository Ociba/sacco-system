<section class="inner-content-area">
                <div class="container">
                    <div class="row mb--10 mb-md--60">
                        <div class="col-lg-9 order-lg-2">
                            <div class="row">
                            @foreach($shows_profile_details as $profile)
                                <div class="col-lg-4 col-sm-6 mb--50">
                                    <div class="team-member team-member-style-2">
                                        <div class="team-member__inner">
                                            <figure class="team-member__thumbnail">
                                                <a href="#"><img src="{{asset('images/profile_pictures/'.$profile->image)}}" style="height:200px;" alt="Team Member"></a>
                                            </figure>
                                            <div class="team-member__info">
                                                <div class="team-member__content">
                                                    <h3 class="team-member__name text-center">{{$profile->name}}</h3>
                                                    <span class="team-member__role text-center">{{$profile->role}}</span>
                                                    <p class="team-member__desc">
                                                        {{$profile->work}}
                                                    </p>
                                                </div>
                                                <ul class="social social-round">
                                                    <li class="social__item">
                                                        <a class="social__link" href="https://www.facebook.com/">
                                                            <i class="social__icon fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="social__item">
                                                        <a class="social__link" href="https://www.plus.google.com/">
                                                            <i class="social__icon fa fa-google-plus"></i>
                                                        </a>
                                                    </li>
                                                    <li class="social__item">
                                                        <a class="social__link" href="https://www.twitter.com/">
                                                            <i class="social__icon fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                        <li><a href="/careers">Careers</a></li>
                                        <li><a href="/history">Our History</a></li>
                                        <li><a href="/award">Honors &amp; Awards</a></li>
                                        <li class="active"><a href="/team">Our Team</a></li>
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