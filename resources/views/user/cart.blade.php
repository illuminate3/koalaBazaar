@extends('user.main')

@section('title','Sepet')
@endsection

@section('content')


<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="table-responsive bottommargin">

                <table class="table cart">
                    <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-quantity">Quantity</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/dress-3.jpg" alt="Pink Printed Dress"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="#">Pink Printed Dress</a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount">$19.99</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="2" class="qty" />
                                <input type="button" value="+" class="plus">
                            </div>
                        </td>

                        <td class="cart-product-subtotal">
                            <span class="amount">$39.98</span>
                        </td>
                    </tr>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/shoes-2.jpg" alt="Checked Canvas Shoes"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="#">Checked Canvas Shoes</a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount">$24.99</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" class="qty" />
                                <input type="button" value="+" class="plus">
                            </div>
                        </td>

                        <td class="cart-product-subtotal">
                            <span class="amount">$24.99</span>
                        </td>
                    </tr>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/tshirt-2.jpg" alt="Pink Printed Dress"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="#">Blue Men Tshirt</a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount">$13.99</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="3" class="qty" />
                                <input type="button" value="+" class="plus">
                            </div>
                        </td>

                        <td class="cart-product-subtotal">
                            <span class="amount">$41.97</span>
                        </td>
                    </tr>
                    <tr class="cart_item">
                        <td colspan="6">
                            <div class="row clearfix">
                                <div class="col-md-4 col-xs-4 nopadding"></div>
                                <div class="col-md-8 col-xs-8 nopadding">
                                    <a href="#" class="button button-3d nomargin fright">Update Cart</a>
                                    <a href="shop.html" class="button button-3d notopmargin fright">Proceed to Checkout</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>


        </div>

    </div>

</section><!-- #content end -->

    @endsection
