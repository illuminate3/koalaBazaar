@extends('user.main')

@section('title','Siparis')
@endsection

@section('content')

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_half"></div>
            <div class="col_half col_last"></div>

            <div class="row clearfix">
                <div class="col-md-12">

                    <form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">
                        <div class="col-md-6">
                            <h3>Fatura Adresi</h3>
                            <label for="billing-form-name">Adres Seçin:</label>
                            <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1"
                                    name="billing_address" value="">
                                <option value="">Select...</option>
                                @foreach ($addresses as $address)
                                    <option value="{{$address->id}}"> {{$address->address_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h3 class="">Gönderim Adresi</h3>
                            <label for="billing-form-name">Adres Seçin:</label>
                            <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1"
                                    name="shipping_address" value="">
                                <option value="">Select...</option>
                                @foreach ($addresses as $address)
                                    <option value="{{$address->id}}"> {{$address->address_name}}</option>
                                @endforeach
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
                            <tr class="cart_item">
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/dress-3.jpg"
                                                     alt="Pink Printed Dress"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="#">Pink Printed Dress</a>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        1x2
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount">$39.98</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/shoes-2.jpg"
                                                     alt="Checked Canvas Shoes"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="#">Checked Canvas Shoes</a>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        1x1
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount">$24.99</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/tshirt-2.jpg"
                                                     alt="Pink Printed Dress"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="#">Blue Men Tshirt</a>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        1x3
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount">$41.97</span>
                                </td>
                            </tr>
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
                                    <span class="amount color lead"><strong>$106.94</strong></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <a href="#" class="button button-3d fright" type="submit">Siparişi Ver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section><!-- #content end -->


@endsection