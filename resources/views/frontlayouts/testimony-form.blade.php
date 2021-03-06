<div class="inner-content-area mt--55 mb--60">
                <div class="container">
                    <div class="row mb--60">
                        <div class="col-lg-5 mb-md--45">
                            <h3 class="heading__tertiary mb--20">Get In Touch</h3>
                            <div class="contact-info mb--40">
                                <p><i class="fa fa-map-marker"></i>Kimera Road, Makerere Kikoni B, Kampala Uganda</p>
                                <p><i class="fa fa-phone"></i>(+256) 775401793</p>
                                <p><i class="fa fa-envelope"></i><a href="mailto:ocibajames@gmail.com">ocibajames@gmail.com</a></p>
                                <p><i class="fa fa-whatsapp" style="color:green;"></i>(+256) 775401793</p>
                                <p><i class="fa fa-clock-o"></i> Mon – Fri : 9:00 – 18:00</p>
                            </div>
                            <ul class="social social-round mb--50">
                                <li class="social__item">
                                    <a href="https://www.facebook.com/" class="social__link">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://www.plus.google.com/" class="social__link">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://www.twitter.com/" class="social__link">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                            <div id="google-map"></div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="heading__tertiary mb--20">Testify with Us</h3>
                            <p class="mb--15">Would you like to speak to one of our financial customers over the phone? Just submit your testimony and we’ll be in touch shortly. You can also e-mail us for any further concern.</p>

                            <!-- Contact form Start Here -->
                            <form action="/save-testimony" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form__group mb--20">
                                    <input type="text"  name="name" class="form__input" placeholder="Your name (required)" required>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="email"  name="email" class="form__input" placeholder="Email Address (required)" required>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" name="phone_number" class="form__input" placeholder="Your Phone" required>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="file"  name="image" class="form__input" placeholder="Your image" required>
                                </div>
                                <div class="form__group mb--20">
                                    <textarea class="form__input form__input--textarea"  name="message" maxlength="169" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="form__group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <!-- Contact form end Here -->
                        </div>
                    </div>
                </div>
            </div>