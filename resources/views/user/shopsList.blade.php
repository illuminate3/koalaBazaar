@extends('user.main')

@section('title','Magazalar')
@endsection


@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Shop
                ============================================= -->
                <div id="shop" class="product-1 clearfix">
                    @foreach($paginator->items() as $supplier)
                    <div class="product clearfix">
                        <div class="product-image">
                            <a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}"><img src="{{ $supplier->profile_image }}"></a>
                            <div class="product-overlay">
                                <a href="http://www.instagram.com/{{ $supplier->instagramAccount->username }}" class="add-to-cart"><i class="icon-instagram"></i><span> Instagram </span></a>
                                <a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Profil </span></a>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-title"><h3><a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}">{{ $supplier->shop_name }}</a></h3></div>

                            <p>{{ $supplier->description }}</p>
                            <ul class="iconlist">
                                <li><i class="icon-flag"></i>Ülke: {{ $supplier->country }}</li>
                                <li><i class="icon-phone"></i> {{ $supplier->phone }}</li>
                            </ul>
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
            </div>

        </div>

    </section><!-- #content end -->



@endsection