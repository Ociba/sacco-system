<section class="careers-area">
                <div class="container">
                    <div class="row mb--25">
                        <div class="col-12">
                            <h2 class="heading__secondary-2 font-weight-normal">Want to know more about <strong>Sacco Uganda</strong>?</h2>
                        </div>
                    </div>
                    
                    <div class="row mb--20 mb-xl--15 mb-lg--10 mb-md--55">
                        <div class="col-12">
                        @foreach($display_history_details as $history)
                            <div class="timeline">
                                <div class="timeline__item">
                                    <figure class="timeline__image">
                                        <img src="{{asset('images/profile_pictures/'.$history->image)}}" alt="Our History">
                                    </figure>
                                    <h4>{{$history->year}}</h4>
                                    <p>{{$history->statement}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>