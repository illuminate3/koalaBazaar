@extends('user.main')

@section('title','Kategoriler')
@endsection

@section('content')
    @if($category)
        <section id="page-title">

            <div class="container clearfix">
                <h1> {{ $category->title }} </h1>
                <span>{{ $category->description }}</span>
                <ol class="breadcrumb">
                    <li><a href="{{ action('Frontend\HomeController@index')}}">Anasayfa</a></li>
                    <li class="active">{{ $category->title }}</li>
                </ol>
            </div>

        </section>
    @endif

    <section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last">

                    <!-- Shop
                    ============================================= -->
                    <div id="shop" class="product-2 clearfix">

                        @foreach($paginator->items() as $item)
                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{ action('FileEntryController@show',$item->image) }}" alt="Checked Short Dress"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="#" class="item-quick-view"><i class="icon-zoom-in2"></i><span>View</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title"><h3><a href="#">{{ substr($item->title,0,35) }}@if(strlen($item->title)>35)...@endif</a></h3></div>
                                <div class="product-price"><ins>{{ $item->price }} {{ $item->currencyUnit->unit_short_name }}</ins></div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- #shop end -->
                    <ul class="pagination topmargin nobottommargin">
                        <li @if(1==$paginator->currentPage()) class="disabled" @endif><a
                                    href="{{ $paginator->url(1) }}">«</a></li>
                        @for ($i = 1 ; $i <=$paginator->total(); $i++)
                            <li @if($i==$paginator->currentPage()) class="active" @endif ><a
                                        href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        <li @if($paginator->total()==$paginator->currentPage()) class="disabled" @endif><a
                                    href="{{ $paginator->url($paginator->total()) }}">»</a></li>

                        <li @if(1==$paginator->currentPage()) class="disabled" @endif><a href="{{ $paginator->url(1) }}">«</a></li>
                        @for ($i = 1 ; $i <=$paginator->lastPage(); $i++)
                            <li @if($i==$paginator->currentPage()) class="active" @endif ><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        <li @if($paginator->lastPage()==$paginator->currentPage()) class="disabled" @endif><a href="{{ $paginator->url($paginator->lastPage()) }}">»</a></li>


                    </ul>
                </div>
                <!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget widget_links clearfix">

                            <h4>Ürün Kategorileri</h4>
                            <ul>
                                @foreach(\App\Category::all() as $singleCategory)
                                    <li>
                                        <a href="{{ action('Frontend\HomeController@category',$singleCategory->slug) }}">{{ $singleCategory->title }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="widget clearfix">

                            <h4>Son Eklenenler</h4>

                            <div id="post-list-footer">
                                @foreach($recentlyAddedProducts as $product)
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="{{ action('FileEntryController@show',$product->image) }}" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">{{ $product->title }}</a></h4>
                                        </div>
                                        <ul class="entry-meta">

                                            <li class="color">{{ $product->price }} {{ $product->currencyUnit->unit_short_name }}</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>

                                        </ul>
                                    </div>
                                </div>
                                @endforeach



                            </div>

                        </div>

                        <div class="widget clearfix">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583"
                                    scrolling="no" frameborder="0"
                                    style="border:none; overflow:hidden; width:240px; height:290px;"
                                    allowtransparency="true"></iframe>
                        </div>

                        <div class="widget subscribe-widget clearfix">

                            <h4>Subscribe For Latest Offers</h4>
                            <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside
                                Scoops:</h5>

                            <form action="#" role="form" class="notopmargin nobottommargin">
                                <div class="input-group divcenter">
                                    <input type="text" class="form-control" placeholder="Enter your Email" required="">
										<span class="input-group-btn">
											<button class="btn btn-success" type="submit"><i class="icon-email2"></i>
                                            </button>
										</span>
                                </div>
                            </form>
                        </div>

                        <div class="widget clearfix">

                            <div id="oc-clients-full" class="owl-carousel image-carousel owl-theme owl-loaded">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(-1000px, 0px, 0px); transition: 0.25s; width: 3000px;">
                                        <div class="owl-item cloned" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item">
                                                <a href="#">
                                                    <img src="images/clients/7.png" alt="Clients">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item">
                                                <a href="#">
                                                    <img src="images/clients/8.png" alt="Clients">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item">
                                                <a href="#">
                                                    <img src="images/clients/1.png" alt="Clients">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item">
                                                <a href="#">
                                                    <img src="images/clients/2.png" alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item active" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/3.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/4.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/5.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/6.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/7.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/8.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/1.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 240px; margin-right: 10px;">
                                            <div class="oc-item"><a href="#"><img src="images/clients/2.png"
                                                                                  alt="Clients"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-controls">
                                    <div class="owl-nav">
                                        <div class="owl-prev" style="display: none;">prev</div>
                                        <div class="owl-next" style="display: none;">next</div>
                                    </div>
                                    <div class="owl-dots" style="display: none;"></div>
                                </div>
                            </div>

                            <script type="text/javascript">

                                jQuery(document).ready(function ($) {

                                    var ocClients = $("#oc-clients-full");

                                    ocClients.owlCarousel({
                                        items: 1,
                                        margin: 10,
                                        loop: true,
                                        nav: false,
                                        autoplay: true,
                                        dots: false,
                                        autoplayHoverPause: true
                                    });

                                });

                            </script>

                        </div>

                    </div>
                </div>
                <!-- .sidebar end -->


            </div>

        </div>

    </section>

@endsection