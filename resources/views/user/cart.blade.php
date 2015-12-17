@extends('user.main')

@section('title','Sepet')
@endsection

@section('content')


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
            <div class="table-responsive bottommargin">

                <table class="table cart">
                    <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Ürün</th>
                        <th class="cart-product-price">Birim Fiyatı</th>
                        <th class="cart-product-quantity">Adet</th>
                        <th class="cart-product-subtotal">Toplam</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <?php $productObject=$product->product ;?>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="{{ action('Frontend\ProductController@removeFromCart',['id'=>$product->product_id,'quantity'=>$product->count]) }}" class="remove" title="Bu ürünü kaldır."><i class="icon-trash2"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="{{ action('Frontend\ProductController@show',$product->product_id) }}"><img width="64" height="64" src="{{ action('FileEntryController@show',$productObject->image) }}"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="{{ action('Frontend\ProductController@show',$product->product_id) }}">{{ $productObject->title }}</a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount">{{ $productObject->price }} TRY</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                <input type="button" onclick="window.open('{{ action('Frontend\ProductController@removeFromCart',['id'=>$product->product_id,'quantity'=>1]) }}','_self')"  value="-" class="minus">
                                <input type="text" name="quantity" disabled value="{{ $product->count }}" class="qty" />
                                <input type="button" onclick="window.open('{{ action('Frontend\ProductController@addToCart',$product->product_id) }}','_self')" value="+" class="plus">
                            </div>
                        </td>

                        <td class="cart-product-subtotal">
                            <span class="amount">{{ $product->count*$productObject->price }} TRY</span>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
            <div class="col-md-12 col-xs-12 nopadding">
                <a href="{{ action('Frontend\ProductController@showCheckOut') }}" class="button button-3d notopmargin fright">İşleme Devam Et</a>
            </div>


        </div>

    </div>

</section><!-- #content end -->

    @endsection
