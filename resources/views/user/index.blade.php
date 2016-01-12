@extends('user.main')
@section('title','KoalaBazaar')
@endsection

@section('content')

        <!-- Content
        ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_two_third bottommargin-lg">

                <div class="fslider" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <a href="{{ action('Frontend\ProductController@show',2) }}">
                                    <img src="{{asset('/user')}}/images/shop/slider/5.jpg" alt="Shop Image">
                                </a>
                            </div>
                            <div class="slide">
                                <a href="{{ action('Frontend\ProductController@show',1) }}">
                                    <img src="{{asset('/user')}}/images/shop/slider/6.jpg" alt="Shop Image">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col_one_third bottommargin-lg col_last">

                <div class="col_full bottommargin-sm">
                    <a href="{{ action('Frontend\ProductController@show',5) }}"><img
                                src="{{asset('/user')}}/images/shop/banners/13.jpg" alt="Image"></a>
                </div>

                <div class="col_full nobottommargin">
                    <a href="{{ action('Frontend\ProductController@show',3) }}"><img
                                src="{{asset('/user')}}/images/shop/banners/14.jpg" alt="Image"></a>
                </div>

            </div>

            <div class="clear"></div>

        </div>

        <div class="promo parallax promo-full bottommargin-lg"
             style="background-image: url('images/parallax/3.jpg');" data-stellar-background-ratio="0.4">
            <div class="container clearfix">
                <h3>Instagram'da satış yapan butiklerle online alışveriş</h3>
                <span>Sistemimize kayıtlı butiklerle keyifli alışverişler dileriz.</span>
                <a href="{{ action('Frontend\HomeController@category') }}" class="button button-xlarge button-rounded">Alışverişe
                    Başla</a>
            </div>
        </div>

        <div class="container clearfix">


            <div class="col_one_third nobottommargin">

                <div class="fancy-title title-border">
                    <h4>Son Ürünler</h4>
                </div>

                <div>
                    @foreach($recentlyArrivedProducts as $recentlyArrivedProduct)
                        <div class="spost clearfix">
                            <div class="entry-image">
                                <a href="{{ action('Frontend\ProductController@show',$recentlyArrivedProduct->id) }}"><img
                                            src="{{ action('FileEntryController@show',$recentlyArrivedProduct->image) }}"
                                            alt="Image"></a>
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4>
                                        <a href="{{ action('Frontend\ProductController@show',$recentlyArrivedProduct->id) }}">{{ $recentlyArrivedProduct->title }}</a>
                                    </h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">{{ $recentlyArrivedProduct->price }}try</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <div class="col_one_third nobottommargin">

                <div class="fancy-title title-border">
                    <h4>Popüler Ürünler</h4>
                </div>

                <div>

                    @foreach($popularProducts as $populerProduct)
                        <div class="spost clearfix">
                            <div class="entry-image">
                                <a href="{{ action('Frontend\ProductController@show',$populerProduct->id) }}"><img
                                            src="{{ action('FileEntryController@show',$populerProduct->image) }}"
                                            alt="Image"></a>
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4>
                                        <a href="{{ action('Frontend\ProductController@show',$populerProduct->id) }}">{{ $populerProduct->title }}</a>
                                    </h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">{{ $populerProduct->price }}try</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <div class="col_one_third nobottommargin col_last">

                <div class="fancy-title title-border">
                    <h4>Size Önerilenler</h4>
                </div>

                <div>

                    @foreach($recommendedProducts as $recommendedProduct)
                        <div class="spost clearfix">
                            <div class="entry-image">
                                <a href="{{ action('Frontend\ProductController@show',$recommendedProduct->id) }}"><img
                                            src="{{ action('FileEntryController@show',$recommendedProduct->image) }}"
                                            alt="Image"></a>
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4>
                                        <a href="{{ action('Frontend\ProductController@show',$recommendedProduct->id) }}">{{ $recommendedProduct->title }}</a>
                                    </h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">{{ $recommendedProduct->price }}try</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <div class="clear"></div>
            <div class="line"></div>

            <div id="oc-clients-full" class="owl-carousel image-carousel">
                @foreach($suppliers as $supplier)
                    <div class="oc-item"><a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}"><img
                                    src="{{ $supplier->profile_image }}"
                                    alt="Clients"></a></div>
                @endforeach

            </div>

            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    var ocClients = $("#oc-clients-full");
                    ocClients.owlCarousel({
                        margin: 30,
                        nav: false,
                        autoplay: true,
                        dots: false,
                        autoplayHoverPause: true,
                        responsive: {
                            0: {items: 2},
                            480: {items: 3},
                            768: {items: 4},
                            992: {items: 5},
                            1200: {items: 7}
                        }
                    });
                });
            </script>
        </div>
    </div>

</section>
<!-- #content end -->

@endsection
