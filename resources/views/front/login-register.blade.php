<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trusted Finance and Business Sacco</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    @include('frontlayouts.css')

</head>

<body>

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        @include('frontlayouts.header')
        <section class="page-title-area bg-image ptb--80" data-bg-image="{{asset('assets/img/bg/page_title_bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Login &amp; Register</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title Area End -->

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area mb--75">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li ><span>Login &amp; Register</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content-wrapper">
        <div class="inner-content-area pb--80">
                <div class="container">
                    <div class="row">
                        @include('layouts.login')
                        <div class="col-md-6">
                            {{--
                            <div class="register-box">
                                <h4 class="heading__tertiary mb--30">Register</h4>
                                <form class="form form--login">
                                    <div class="form__group mb--20">
                                        <label class="form__label form__label--2" for="email">Email address <span class="required">*</span></label>
                                        <input type="email" class="form__input form__input--2" id="email" name="email">
                                    </div>
                                    <div class="form__group mb--20">
                                       <label class="form__label form__label--2" for="register_password">Password <span class="required">*</span></label>
                                        <input type="password" class="form__input form__input--2" id="register_password" name="register_password">
                                    </div>
                                    <p class="privacy-text mb--20">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                                    <div class="form__group">
                                        <input type="submit" value="Register" class="btn btn-submit btn-style-1">
                                    </div>
                                </form>
                            </div>
                            --}}
                            <div class="services-item services-item-3 mb--20">
                                <div class="services-item__icon">
                                    <div class="icon icon-outline bd-color--primary">
                                        <i class="fa fa-file-text-o color--primary"></i>
                                    </div>
                                </div>
                                <div class="services-item__info">
                                    <h3 class="services-item__title">Savings</h3>
                                    <p>Saving Accumulation addresses an individual's investment needs</p>
                                </div>
                            </div>
                            <div class="services-item services-item-3 mb--20">
                                <div class="services-item__icon">
                                    <div class="icon icon-outline bd-color--primary">
                                        <i class="fa fa-sliders color--primary"></i>
                                    </div>
                                </div>
                                <div class="services-item__info">
                                    <h3 class="services-item__title">Benefit</h3>
                                    <p>Benefits planning reduces the tax implications of individual, investment</p>
                                </div>
                            </div>
                            <div class="services-item services-item-3 mb--20">
                                <div class="services-item__icon">
                                    <div class="icon icon-outline bd-color--primary">
                                        <i class="fa fa-line-chart color--primary"></i>
                                    </div>
                                </div>
                                <div class="services-item__info">
                                    <h3 class="services-item__title">Risk Management</h3>
                                    <p>Risk management is intended to manage financial and other losses</p>
                                </div>
                            </div>
                            <div class="services-item services-item-3 mb--20">
                                <div class="services-item__icon">
                                    <div class="icon icon-outline bd-color--primary">
                                        <i class="fa fa-university color--primary"></i>
                                    </div>
                                </div>
                                <div class="services-item__info">
                                    <h3 class="services-item__title">Business Planning</h3>
                                    <p>Business planning focuses on issues specific to business owners</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('frontlayouts.footer')
        <div class="fp-global-overlay"></div>
        <a class="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>
        @include('frontlayouts.search')
        @include('frontlayouts.customise-color')
        <!-- Color Variation End -->
    </div>
    <!-- jQuery JS -->
    @include('frontlayouts.javascript')

    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>
</html>