@extends('user.main')
@section('title','Kategoriler')
@endsection

@section('content')

        <!-- Page Title
    ============================================= -->
@if($category)
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{ $category->title }}</h1>
            <span>{{ $category->description }}</span>
            <ol class="breadcrumb">
                <li><a href="{{ action('Frontend\HomeController@index') }}">Anasayfa</a></li>
                <li class="active">{{ $category->title }}</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    @endif
            <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if(\Illuminate\Support\Facades\Session::has('success'))
                    @foreach (\Illuminate\Support\Facades\Session::pull('success') as $success)
                        <div class="alert alert-success">
                            {{ $success }}
                        </div>
                        @endforeach
                        @endif
                                <!-- Post Content
                ============================================= -->
                        <div class="postcontent nobottommargin col_last">

                            <!-- Shop
                            ============================================= -->
                            <div id="shop" class="product-3 clearfix">

                                @foreach($paginator->items() as $item)
                                    <div class="product clearfix">
                                        <div class="product-image">
                                            <a href="{{action('Frontend\ProductController@show',$item->id)}}"><img
                                                        src="{{ action('FileEntryController@show',$item->image) }}"
                                                        alt="Checked Short Dress"></a>

                                            <div class="product-overlay">
                                                <a href="{{action('Frontend\ProductController@addToCart',$item->id)}}"
                                                   class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete Ekle</span></a>
                                                <a href="{{action('Frontend\ProductController@show',$item->id)}}"
                                                   class="item-quick-view"><i
                                                            class="icon-zoom-in2"></i><span>View</span></a>
                                            </div>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a
                                                            href="{{action('Frontend\ProductController@show',$item->id)}}">
                                                        @if(strlen($item->title)>15)
                                                            {{ substr($item->title,0,15) }}...
                                                            @else {{ $item->title }}
                                                        @endif</a></h3></div>
                                            <div class="product-price">
                                                <ins>{{ $item->price }} {{ $item->currencyUnit->unit_short_name }}</ins>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <!-- #shop end -->

                            <ul class="pagination topmargin nobottommargin">
                                <li @if(1==$paginator->currentPage()) class="disabled" @endif><a
                                            href="{{ $paginator->url(1) }}">«</a></li>
                                @for ($i = 1 ; $i <=$paginator->lastPage(); $i++)
                                    <li @if($i==$paginator->currentPage()) class="active" @endif ><a
                                                href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li @if($paginator->lastPage()==$paginator->currentPage()) class="disabled" @endif><a
                                            href="{{ $paginator->url($paginator->lastPage()) }}">»</a></li>
                            </ul>
                        </div><!-- .postcontent end -->

                        <!-- Sidebar
                        ============================================= -->
                        <div class="sidebar nobottommargin">
                            <div class="sidebar-widgets-wrap">

                                <div class="widget widget_links clearfix">

                                    <h4>Kategoriler</h4>
                                    <ul>
                                        @foreach(\App\Category::all() as $category)
                                            <li>
                                                <a href="{{ action('Frontend\HomeController@category',$category->slug) }}">{{ $category->title }}</a>
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
                                                    <a href="{{action('Frontend\ProductController@show',$product->id)}}"><img
                                                                src="{{ action('FileEntryController@show',$product->image) }}"
                                                                alt="Image"></a>
                                                </div>
                                                <div class="entry-c">
                                                    <div class="entry-title">
                                                        <h4>
                                                            <a href="{{action('Frontend\ProductController@show',$product->id)}}">{{ $product->title }}</a>
                                                        </h4>
                                                    </div>
                                                    <ul class="entry-meta">

                                                        <li class="color">{{ $product->price }} {{ $product->currencyUnit->unit_short_name }}</li>
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

    </section><!-- #content end -->

    @endsection