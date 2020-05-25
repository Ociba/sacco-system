<div class="container">
                    <div class="row mb--45">
                        <div class="col-12 text-center">
                            <h2>Our Projects</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="fp-element-carousel slick-dot-mb-30 slick-dot-style-2"
                            data-slick-options='{
                                "spaceBetween": 10,
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "swipeToSlide": true,
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
                            @foreach($display_all_projects as $project)
                                <div class="item">
                                    <div class="project-item-2">
                                        <figure class="project-item__thumbnail">
                                            <img src="{{asset('images/profile_pictures/'.$project->image)}}" alt="Project">
                                        </figure>
                                        <div class="project-item__info">
                                            <h3 class="project-item__title"><a href="/project">{{$project->project_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>