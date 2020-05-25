<footer class="footer">
            <div class="footer-top border-bottom-2 pt--70 pt-md--85 pb--45 pb-lg--40 pb-md--65">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-md--30 mb-sm--45">
                            <div class="footer-widget">
                                <div class="textwidget">
                                    <a href="index.html" class="d-block">
                                        <img src="{{asset('assets/img/logo/logo_02.png')}}" alt="Logo" class="footer-logo mb--30">
                                    </a>
                                    <p class="mb--40">Sacco Uganda is one of the world’s leading financial consulting firm.</p>
                                    <p><i class="fa fa-map-marker"></i>Kimera Road, Makerere Kikoni, Kampala.</p>
                                    <p><i class="fa fa-phone"></i>+256 77540 1793</p>
                                    <p><i class="fa fa-envelope"></i><a href="maito:ocibajames@gmail.com">ocibajames@gmail.com</a></p>
                                    <p><i class="fa fa-desktop"></i><a href="ocibajames@gmail.com">ocibajames@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-md--30 mb-sm--20">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--20">Explore</h3>
                                <ul class="widget-menu two-column-list">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/our-services">Services</a></li>
                                    <li><a href="/testify">Testimonials</a></li>
                                    <li><a href="/project">Projects</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                    <li><a href="/laws">Sacco laws</a></li>
                                    <li><a href="/team">Our team</a></li>
                                    <li><a href="/front-loan">Loans</a></li>
                                    <li><a href="/front-saving">Saving</a></li>
                                    <li><a href="/front-benefit">Benefit</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--20">Subscribe</h3>
                                <div class="textwidget border-bottom-2 mb--30 pb--30">
                                    <form action="/save-subscription" class="newsletter" method="post">
                                    @csrf
                                        <input type="email" class="newsletter__input" name="email" id="newsletter_email" placeholder="Enter Your E-mail" required>
                                        <button type="submit" class="newsletter__submit"><i class="fa fa-envelope"></i></button>
                                    </form>
                                    <p>Get latest updates and offers.</p>
                                </div>
                                <div class="textwidget">
                                    <ul class="social social-with-text two-column-list">
                                        <li class="social__item">
                                            <a class="social__link" href="ocibajames@yahoo.com">
                                                <i class="social__icon fa fa-facebook"></i>
                                                <span class="social__text">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a class="social__link" href="https://www.plus.google.com/">
                                                <i class="social__icon fa fa-google-plus"></i>
                                                <span class="social__text">Google Plus</span>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a class="social__link" href="https://www.twitter.com/">
                                                <i class="social__icon fa fa-twitter"></i>
                                                <span class="social__text">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a class="social__link" href="https://www.linkedin.com/">
                                                <i class="social__icon fa fa-linkedin"></i>
                                                <span class="social__text">Linkedin</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb--30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left">
                            <p class="copyright-text">Sacco Uganda &copy; {{ date('Y') }} all rights reserved</p>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <ul class="footer-menu">
                                <li><a href="#">Legal</a></li>
                                <li><a href="#">Sitemap</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>