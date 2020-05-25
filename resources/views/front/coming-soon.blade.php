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
        <div class="main-content-wrapper">
        <div class="coming-soon-area">
          @foreach($display_coming_soon_message as $message) 
                <div class="container">
                    <div class="row mb--45">
                        <div class="col-12 text-center">
                            <div class="coming-soon">
                                <h2 class="mb--50">Coming Soon</h2>
                                <p>{{$message->message}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="countdown-wrap">
                                <div class="countdown d-flex justify-content-between text-center" data-countdown="{{$message->expected_date}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Color Variation End -->
    </div>
    <!-- jQuery JS -->
    @include('frontlayouts.javascript')


</body>
</html>