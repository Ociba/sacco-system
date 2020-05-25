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
                        <h1 class="page-title">Shop</h1>
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
                            <li class="current"><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content-wrapper">
        <div class="inner-content-area mt--60 mb--20 mb-lg--60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 mb-md--50">
                            <div class="shop-toolbar mb--50">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 text-sm-left text-center mb--20">
                                        <p class="product-pages">Showing all 6 results</p>
                                    </div>
                                    <div class="col-sm-6 text-sm-right text-center">
                                        <form action="#" class="product-ordering">
                                            <select name="orderby">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by latest</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-products">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('assets/img/products/shop1.jpg')}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">A Passion For Leadership</a></h2>
                                                    <div class="star-rating star-five">
                                                        <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <div class="product-price mt--5">
                                                        <span>$47.00</span>
                                                    </div>
                                                    <a href="single-product.html" class="read-more-btn-2">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($display_item as $item)
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('images/profile_pictures/'.$item->image)}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">{{$item->product}}</a></h2>
                                                    <div class="star-rating star-4">
                                                        <span>Rated <strong class="rating">4.00</strong> out of 4</span>
                                                    </div>
                                                    <div class="product-price mt--5">
                                                        <span>${{$item->price}}</span>
                                                    </div>
                                                    <a href="/cart" class="add-to-cart-btn">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('assets/img/products/shop6.jpg')}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <span class="product-label">Sale!</span>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">Merchants In The Temple</a></h2>
                                                    <div class="star-rating star-4">
                                                        <span>Rated <strong class="rating">4.00</strong> out of 4</span>
                                                    </div>
                                                    <div class="product-price mt--5">
                                                        <span class="old-price">$45.00</span>
                                                        <span class="new-price">$40.00</span>
                                                    </div>
                                                    <a href="/cart" class="add-to-cart-btn">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('assets/img/products/shop4.jpg')}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">Procrastinate On Purpose</a></h2>
                                                    <div class="product-price mt--5">
                                                        <span class="money">$35.00</span>
                                                        <span class="money-separator">-</span>
                                                        <span class="money">$37.00</span>
                                                    </div>
                                                    <a href="/cart" class="add-to-cart-btn">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('assets/img/products/shop3.jpg')}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">Sold Out</a></h2>
                                                    <div class="product-price mt--5">
                                                        <span class="money">$45.00</span>
                                                    </div>
                                                    <a href="/cart" class="add-to-cart-btn">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 mb--40">
                                        <div class="fp-product">
                                            <div class="product-inner">
                                                <figure class="product-thumbnail">
                                                    <a href="single-product.html">
                                                        <img src="{{asset('assets/img/products/shop2.jpg')}}" alt="Product">
                                                    </a>
                                                    <a data-toggle="modal" data-target="#productModal" class="quick-view">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </figure>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a href="single-product.html">The Courage To Act</a></h2>
                                                    <div class="product-price mt--5">
                                                        <span class="money">$45.00</span>
                                                    </div>
                                                    <a href="/cart" class="add-to-cart-btn">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 order-lg-1">
                            <aside class="sidebar">
                                <div class="widget mb--40">
                                    <h3 class="widget-title mb--30">Product Categories</h3>
                                    <ul class="categories-menu">
                                        <li><i class="fa fa-caret-right"></i><a href="shop.html">Book</a></li>
                                        <li><i class="fa fa-caret-right"></i><a href="shop.html">Magazine</a></li>
                                        <li><i class="fa fa-caret-right"></i><a href="shop.html">Uncategorized</a></li>
                                    </ul>
                                </div>
                                <div class="widget mb--40">
                                    <h3 class="widget-title mb--30">Filter by price</h3>
                                    <div class="widget_content">
                                        <form action="#" method="post">
                                            <div id="slider-range" class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all">
                                                    
                                                </div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all">
                                                    
                                                </span>
                                                <span class="ui-slider-handle ui-slider-handle-right ui-state-default ui-corner-all">
                                                    
                                                </span>
                                            </div>
                                            <div class="filter-price">
                                                <div class="filter-price__count">
                                                    <button type="submit" class="btn btn-outline btn-bd-alto btn-color-emp btn-bg-transparent">
                                                        Filter
                                                    </button>
                                                    <div class="filter-price__input-group">
                                                        <span>Price: </span>
                                                        <input type="text" id="amount" class="amount-range" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="widget-title mb--30">Top Rated Products</h3>
                                    <div class="product-widget">
                                        <div class="product-widget__item">
                                            <figure class="product-widget__thumbnail">
                                                <img src="{{asset('assets/img/products/shop1-70x88.jpg')}}" alt="Product image">
                                            </figure>
                                            <div class="product-widget__info">
                                                <h4 class="product-widget__title">
                                                    <a href="single-project.html">A Passion For Leadership</a>
                                                </h4>
                                                <div class="star-rating star-five">
                                                    <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-widget__item">
                                            <figure class="product-widget__thumbnail">
                                                <img src="{{asset('assets/img/products/shop6-70x88.jpg')}}" alt="Product image">
                                            </figure>
                                            <div class="product-widget__info">
                                                <h4 class="product-widget__title">
                                                    <a href="single-project.html">Merchants In The Temple</a>
                                                </h4>
                                                <div class="star-rating star-four">
                                                    <span>Rated <strong class="rating">4.00</strong> out of 5</span>
                                                </div>
                                                <div class="product-widget__price">
                                                    <span class="old-price">$45.00</span>
                                                    <span class="new-price">$40.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-widget__item">
                                            <figure class="product-widget__thumbnail">
                                                <img src="{{asset('assets/img/products/shop2-70x88.jpg')}}" alt="Product image">
                                            </figure>
                                            <div class="product-widget__info">
                                                <h4 class="product-widget__title">
                                                    <a href="single-project.html">The Courage To Act</a>
                                                </h4>
                                                <div class="product-widget__price">
                                                    <span class="old-price">$45.00</span>
                                                    <span class="new-price">$40.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-widget__item">
                                            <figure class="product-widget__thumbnail">
                                                <img src="{{asset('assets/img/products/shop4-70x88.jpg')}}" alt="Product image">
                                            </figure>
                                            <div class="product-widget__info">
                                                <h4 class="product-widget__title">
                                                    <a href="single-project.html">Procrastinate On Purpose</a>
                                                </h4>
                                                <div class="product-widget__price">
                                                    <span class="money">$35.00</span>
                                                    <span class="money-separator">-</span>
                                                    <span class="money">$37.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-widget__item">
                                            <figure class="product-widget__thumbnail">
                                                <img src="{{asset('assets/img/products/shop5-70x88.jpg')}}" alt="Product image">
                                            </figure>
                                            <div class="product-widget__info">
                                                <h4 class="product-widget__title">
                                                    <a href="single-project.html">Get What's Yours</a>
                                                </h4>
                                                <div class="product-widget__price">
                                                    <span>$45.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
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