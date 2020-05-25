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
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title Area End -->

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="current"><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content-wrapper">
        <div class="page-content-inner mtb--60">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-md--50">
                            <form class="cart-form" action="#">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>Picture</th>
                                                        <th class="text-left">Product</th>
                                                        <th>price</th>
                                                        <th>quantity</th>
                                                        <th>total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($show_items_selected as $selected)
                                                    <tr>
                                                        <td class="product-remove text-left"><a href="#"><i class="pe-7s-close"></i></a></td>
                                                        <td class="product-thumbnail text-left">
                                                            <img src="{{asset('images/profile_pictures/'.$selected->image)}}" alt="Product Thumnail">
                                                        </td>
                                                        <td class="product-name text-left wide-column">
                                                            <h3>
                                                                <a href="single-product.html">{{$selected->product}}</a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="money">${{$selected->price}}</span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input type="number" class="quantity-input" name="quantity" id="qty-1" value="1" min="1">
                                                            </div>
                                                        </td>
                                                        <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">${{$selected->total}}</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row no-gutters border-top pt--20 mt--20">
                                    <div class="col-md-6 mb-sm--40">
                                        <div class="coupon d-flex">
                                            <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Coupon Code">
                                            <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <button type="submit" class="cart-form__btn">Clear Cart</button>
                                        <button type="submit" class="cart-form__btn">Update Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 offset-lg-6">
                            <div class="cart-collaterals">
                                <div class="cart-totals">
                                    <h3 class="mb--15">Cart totals</h3>
                                    <div class="cart-calculator">
                                        <div class="cart-calculator__item">
                                            <div class="cart-calculator__item--head">
                                                <span>Subtotal</span>
                                            </div>
                                            <div class="cart-calculator__item--value">
                                                <span>$196.00</span>
                                            </div>
                                        </div>
                                        <div class="cart-calculator__item">
                                            <div class="cart-calculator__item--head">
                                                <span>Shipping</span>
                                            </div>
                                            <div class="cart-calculator__item--value">
                                                <span>Flat rate: $20.00</span>
                                                <div class="shipping-calculator-wrap">
                                                    <a href="#shipping_calculator" class="expand-btn">Calculate Shipping</a>
                                                    <form id="shipping_calculator" class="form shipping-calculator-form hide-in-default mt--10">
                                                        <div class="form__group">
                                                            <select id="calc_shipping_country" name="calc_shipping_country" class="nice-select form__input--select form__input--2">
                                                                <option value="">Select a country…</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD" selected="selected">Bangladesh</option>
                                                                <option value="BD">Brazil</option>
                                                                <option value="CN">China</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="FR">France</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="HK">Hong Kong</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IR">Iran</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="RU">Russia</option>
                                                                <option value="KR">South Korea</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom (UK)</option>
                                                                <option value="US">United States (US)</option>
                                                            </select>
                                                        </div>

                                                        <div class="form__group">
                                                            <select id="calc_shipping_district" name="calc_shipping_district" class="nice-select form__input--select form__input--2">
                                                                <option value="">Select a District…</option>
                                                                <option>BARISAL</option>
                                                                <option>BHOLA</option>
                                                                <option>BANDARBAN</option>
                                                                <option>BRAHMANBARIA</option>
                                                                <option>CHANDPUR</option>
                                                                <option>CHITTAGONG</option>
                                                                <option>COMILLA</option>
                                                                <option>COX'S BAZAR</option>
                                                                <option>DHAKA</option>
                                                                <option>FARIDPUR</option>
                                                                <option>FENI</option>
                                                                <option>GAZIPUR</option>
                                                                <option>GOPALGANJ</option>
                                                                <option>JAMALPUR</option>
                                                                <option>KHAGRACHHARI</option>
                                                                <option>KISHOREGONJ</option>
                                                                <option>LAKSHMIPU</option>
                                                                <option>RMADARIPUR</option>
                                                                <option>MUNSHIGANJ</option>
                                                                <option>MYMENSINGH</option>
                                                                <option>NARAYANGANJ</option>
                                                                <option>NARSINGDI</option>
                                                                <option>NETRAKONA</option>
                                                                <option>NOAKHALI</option>
                                                                <option>RANGAMATI </option>
                                                                <option>RAJBARI</option>
                                                                <option>SHARIATPUR</option>
                                                                <option>SHERPUR</option>
                                                                <option>TANGAIL</option>
                                                            </select>
                                                        </div>

                                                        <div class="form__group mb--10 mb-sm--15">
                                                            <input type="text" name="calc_shipping_city" id="calc_shipping_city" class="form__input form__input--2" placeholder="Town / City">
                                                        </div>

                                                        <div class="form__group mb--10 mb-sm--15">
                                                            <input type="text" name="calc_shipping_zip" id="calc_shipping_zip" class="form__input form__input--2" placeholder="Postcode / Zip">
                                                        </div>

                                                        <div class="form__group">
                                                            <button type="submit" class="btn btn-submit">Update Totals</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-calculator__item order-total">
                                            <div class="cart-calculator__item--head">
                                                <span>Total</span>
                                            </div>
                                            <div class="cart-calculator__item--value">
                                                <span class="product-price-wrapper">
                                                    <span class="money">$226.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/checkout" class="btn">
                                    Proceed To Checkout
                                </a>
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


</body>
</html>