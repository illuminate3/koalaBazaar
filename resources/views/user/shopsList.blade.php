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
                            <a href="#"><img src="{{ $supplier->profile_image }}"></a>
                            <div class="product-overlay">
                                <a href="http://www.instagram.com/{{ $supplier->instagramAccount->username }}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Instagram </span></a>
                                <a href="#" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Profil </span></a>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-title"><h3><a href="#">{{ $supplier->shop_name }}</a></h3></div>
                            <div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
                            <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias aut ipsum praesentium officia pariatur doloremque dolor tenetur esse vitae voluptatibus inventore delectus. Eaque laboriosam quaerat accusamus! Porro, laboriosam temporibus dolorum doloremque dolorem ex ducimus recusandae repellat neque sapiente ab numquam rerum deleniti!</p>
                            <ul class="iconlist">
                                <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                                <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                                <li><i class="icon-caret-right"></i> Delivered in 3-5 Days</li>
                                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
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