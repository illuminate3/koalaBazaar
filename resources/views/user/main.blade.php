<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/style.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('/user')}}/css/magnific-popup.css" type="text/css"/>

    <link rel="stylesheet" href="{{asset('/user')}}/css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{asset('/user')}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{asset('/user')}}/js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
    ============================================= -->
    <div id="top-bar">

        <div class="container clearfix">

            <div class="col_half nobottommargin hidden-xs">

                <p class="nobottommargin">Email:</strong> koalabazaar@gmail.com
                </p>

            </div>

            <div class="col_half col_last fright nobottommargin">

                <!-- Top Links
                ============================================= -->
                <div class="top-links">
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->isCustomer())
                            <li>
                                <a href="{{ action('Dashboard\CustomerController@show') }}">Panelim</a>
                            </li>
                            @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->isSupplier())
                                <li>
                                    <a href="{{ action('Dashboard\SupplierController@show') }}">Panelim</a>
                                </li>
                                @endif
                            <li>
                                <a href="{{ action('AuthenticationController@doLogout') }}">Çıkış Yap</a>
                            </li>

                        @else
                            <li>
                                <a href="#">Giris Yap</a>

                                <div class="top-link-section">
                                    <form id="top-login" role="form"
                                          action="{{ action('AuthenticationController@doLogin')}}" method="post">
                                        <div class="input-group" id="top-login-username">
                                        <span class="input-group-addon">
                                            <i class="icon-user"></i></span>
                                            <input type="email" class="form-control" placeholder="Email address"
                                                   required=""
                                                   name="email">
                                        </div>
                                        <div class="input-group" id="top-login-password">
                                            <span class="input-group-addon"><i class="icon-key"></i></span>
                                            <input type="password" class="form-control" placeholder="Password"
                                                   required=""
                                                   name="pass">
                                        </div>
                                        <button class="btn btn-danger btn-block" type="submit">Sign in</button>
                                        <a href="{{ action('AuthenticationController@loginviainstagram') }}"
                                           class="btn btn-primary btn-block" name="login-with-instagram">Instagram
                                        </a>

                                    </form>
                                </div>
                            </li>
                            <li>
                                <a href="{{ action('AuthenticationController@showRegister') }}">Kayıt Ol</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- .top-links end -->

            </div>

        </div>

    </div>
    <!-- #top-bar end -->

    <!-- Header
    ============================================= -->
    <header id="header" class="sticky-style-2">

        <div class="container clearfix">

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ action('Frontend\HomeController@index') }}" class="standard-logo"
                   data-dark-logo="{{asset('/user')}}/images/logo-dark.png"><img
                            src="{{asset('/user')}}/images/logo.png" alt="Canvas Logo"></a>
                <a href="{{ action('Frontend\HomeController@index') }}" class="retina-logo"
                   data-dark-logo="{{asset('/user')}}/images/logo-dark@2x.png"><img
                            src="{{asset('/user')}}/images/logo@2x.png" alt="Canvas Logo"></a>
            </div>
            <!-- #logo end -->


        </div>

        <div id="header-wrap">

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-2">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <ul>
                        <li class="current"><a href="{{ action('Frontend\HomeController@index') }}">
                                <div>Anasayfa</div>
                            </a></li>
                        <!-- Mega Menu
                        ============================================= -->
                        <li class="mega-menu"><a href="{{ action('Frontend\HomeController@category') }}">
                                <div>Ürünler</div>
                                <span>Out of the Box</span></a>
                            <ul>
                                @foreach(\App\Category::all() as $category)

                                    <li><a href="{{ action('Frontend\HomeController@category',$category->slug) }}">
                                            <div>{{ $category->title }}</div>
                                        </a></li>

                                @endforeach
                            </ul>
                        </li>
                        <!-- .mega-menu end -->

                        <li><a href="{{ action('Frontend\HomeController@shopList') }}">
                                <div>Mağazalar</div>
                            </a></li>
                    </ul>
                    @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->isCustomer())
                            <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart">
                        <a href="#" id="top-cart-trigger"><i
                                    class="icon-shopping-cart"></i><span>{{ count(\Illuminate\Support\Facades\Auth::user()->userable->wishedProducts) }}</span></a>

                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Sepetim</h4>
                            </div>
                            <div class="top-cart-items">
                                <?php $totalPrice = 0;
                                ?>

                                @foreach(\Illuminate\Support\Facades\Auth::user()->userable->wishedProducts as $wishedProduct)
                                    <?php $totalPrice += $wishedProduct->product->price;?>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="{{ action('Frontend\ProductController@show',$wishedProduct->product->id) }}"><img
                                                        src="{{ action('FileEntryController@show',$wishedProduct->product->image)  }} }}"
                                                        alt="{{ $wishedProduct->product->title }}"/></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">{{ $wishedProduct->product->title }}</a>
                                            <span class="top-cart-item-price">{{ $wishedProduct->product->price }} {{ $wishedProduct->product->currencyUnit->unit_short_name }}</span>
                                            <span class="top-cart-item-quantity">x 1</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="top-cart-action clearfix">
                                <span class="fleft top-checkout-price">{{ $totalPrice }}</span>
                                <button onclick="window.open('{{ action('Frontend\ProductController@showCart') }}','_self')"
                                        class="button button-3d button-small nomargin fright">View Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- #top-cart end -->
                    @endif
                    @endif

                </div>

            </nav>
            <!-- #primary-menu end -->

        </div>

    </header>
    <!-- #header end -->


    @section('content')
    @show

            <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">
        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>

                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i
                            class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i
                            class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div>
        <!-- #copyrights end -->

    </footer>
    <!-- #footer end -->

</div>
<!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{asset('/user')}}/js/functions.js"></script>

</body>
</html>