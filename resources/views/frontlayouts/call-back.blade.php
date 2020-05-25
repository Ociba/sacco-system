<section class="callback-area opacity-bg bg-image" data-bg-image="{{asset('assets/img/bg/home02_i3.jpg')}}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="callback-box border-radius-top text-center mt--70">
                                <h2 class="mb--20">Request A Call Back</h2>
                                <p class="mb--25">Would you like to speak to one of our financial advisers over the phone? Just submit your details and we’ll be in touch shortly. You can also e-mail us for any further concern.</p>
                                <form action="/save-call-back"  method="post" class="form">
                                @csrf
                                    <div class="form__group mb--20">
                                        <input type="text" name="name" id="callback_name" class="form__input" placeholder="Your Name" required>
                                    </div>
                                    <div class="form__group mb--20">
                                        <select class="form__input form__input--select" name="question" id="callback_select" required>
                                            <option value="discuss">I would like to discuss</option>
                                            <option value="talk">I would like to talk to manager</option>
                                            <option value="borrow">I would like to borrow loan</option>
                                        </select>                                        
                                    </div>
                                    <div class="form__group mb--20">
                                        <input type="email" name="email" id="callback_email" class="form__input" placeholder="Your Email" required>
                                    </div>
                                    <div class="form__group mb--20">
                                        <input type="text" name="contact" id="callback_phone" class="form__input" placeholder="Your Phone Number" required>
                                    </div>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>