@extends('user.main')

@section('title','Siparis')
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
            <div class="col_half"></div>
            <div class="col_half col_last"></div>


            <div class="row clearfix">

                <div class="col-md-12">

                    <form id="billing-form" name="billing-form" class="nobottommargin" action="{{ action('Frontend\ProductController@proceedCheckOut') }}" method="post">
                        <div class="col-md-6">
                            <h3>Fatura Adresi</h3>
                            <label for="billing-form-name">Adres Seçin:</label>
                            <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1"
                                    name="billing_address">
                                <option value="">Select...</option>
                                @for($i=0 ; $i<count($addresses) ; $i++)
                                    <option value="{{$addresses[$i]->id}}"> {{$addresses[$i]->address_name}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h3 class="">Gönderim Adresi</h3>
                            <label for="billing-form-name">Adres Seçin:</label>
                            <select class="form-control input-medium" tabindex="-1" name="shipping_address">
                                @for($i=0 ; $i<count($addresses) ; $i++)
                                    <option value="{{$addresses[$i]->id}}" @if($i==0) selected @endif> {{$addresses[$i]->address_name}}</option>
                                @endfor

                            </select>
                        </div>


                </div>

                <div class="clear bottommargin"></div>

                <div class="col-md-6">
                    <div class="table-responsive clearfix">
                        <h4>Siparişleriniz</h4>

                        <table class="table cart">
                            <thead>
                            <tr>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Ürün</th>
                                <th class="cart-product-quantity">Adet</th>
                                <th class="cart-product-subtotal">Toplam</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $cartTotal=0 ?>
                            @foreach($products as $product)
                                <?php $productObject=$product->product;?>
                            <tr class="cart_item">
                                <td class="cart-product-thumbnail">
                                    <a href="{{ action('Frontend\ProductController@show',$product->product_id) }}"><img width="64" height="64" src="{{ action('FileEntryController@show',$productObject->image) }}"
                                                     ></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="{{ action('Frontend\ProductController@show',$product->product_id) }}">{{ $productObject->title }}</a>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        1x{{ $product->count }}
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount">{{ $product->count*$productObject->price }} TRY</span>
                                </td>
                            </tr>
                                <?php $cartTotal+=$product->count*$productObject->price ;?>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <h4>Alışveriş Tutarı</h4>

                        <table class="table cart">
                            <tbody>

                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Toplam</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span class="amount color lead">
                                       <strong>{{$cartTotal}} TRY</strong>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <button class="button button-3d fright" type="submit">Siparişi Ver</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section><!-- #content end -->


@endsection