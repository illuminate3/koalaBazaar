@extends('user.main')
@section('title','Shop')
    @endsection

@section('content')



    <section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Portfolio Single Image
                ============================================= -->
                <div class="col_one_third portfolio-single-image nobottommargin">
                    <a href="#">
                        <img src="{{ $supplier->profile_image }}" alt=""></a>
                </div><!-- .portfolio-single-image end -->

                <!-- Portfolio Single Content
                ============================================= -->
                <div class="col_two_third portfolio-single-content col_last nobottommargin">

                    <!-- Portfolio Single - Description
                    ============================================= -->
                    <div class="fancy-title title-bottom-border">
                        <h2>{{ $supplier->shop_name }}:</h2>
                    </div>
                    <p>{{ $supplier->description }}</p>
                    <!-- Portfolio Single - Description End -->

                    <div class="line"></div>

                    <!-- Portfolio Single - Meta
                    ============================================= -->
                    <ul class="portfolio-meta bottommargin">
                        <li><span><i class="icon-phone"></i>Telefon:</span> {{ $supplier->phone }}</li>
                        <li><span><i class="icon-flag"></i>Ülke:</span> {{ $supplier->country }}</li>
                        <li><span><i class="icon-map-marker"></i>Şehir:</span>{{ $supplier->city }}</li>
                    </ul>
                    <!-- Portfolio Single - Meta End -->

                    <!-- Portfolio Single - Share
                    ============================================= -->
                    <div class="si-share clearfix">
                        <span>Share:</span>
                        <div>
                            <a href="#" class="social-icon si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-rss">
                                <i class="icon-rss"></i>
                                <i class="icon-rss"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-email3">
                                <i class="icon-email3"></i>
                                <i class="icon-email3"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Portfolio Single - Share End -->

                </div>
                <!-- .portfolio-single-content end -->

                <div class="clear">
                </div>

                <div class="divider divider-center">
                    <i class="icon-circle"></i>
                </div>

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
                                                <a href="{{action('Frontend\ProductController@show',$item->id)}}"><img src="{{ action('FileEntryController@show',$item->image) }}" alt="Checked Short Dress"></a>
                                                <div class="product-overlay">
                                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                                    <a href="{{action('Frontend\ProductController@show',$item->id)}}" class="item-quick-view"><i class="icon-zoom-in2"></i><span>View</span></a>
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
                                        </div>
                                    @endforeach


                                </div><!-- #shop end -->
                                <ul class="pagination topmargin nobottommargin">
                                    <li @if(1==$paginator->currentPage()) class="disabled" @endif><a href="{{ $paginator->url(1) }}">«</a></li>
                                    @for ($i = 1 ; $i <=$paginator->lastPage(); $i++)
                                        <li @if($i==$paginator->currentPage()) class="active" @endif ><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                                    @endfor
                                    <li @if($paginator->lastPage()==$paginator->currentPage()) class="disabled" @endif><a href="{{ $paginator->url($paginator->lastPage()) }}">»</a></li>


                                </ul>
                            </div><!-- .postcontent end -->

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
                                                        <a href="{{action('Frontend\ProductController@show',$product->id)}}"><img src="{{ action('FileEntryController@show',$product->image) }}" alt="Image"></a>
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

                                </div>
                            </div><!-- .sidebar end -->


                        </div>

                    </div>

                </section>


            </div>

        </div>

    </section>

@endsection