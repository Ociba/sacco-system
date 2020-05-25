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
        @include('frontlayouts.account-header')
        <div class="main-content-wrapper">
            @include('frontlayouts.account')
            <!-- Brand Area End -->
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


</body>
</html>