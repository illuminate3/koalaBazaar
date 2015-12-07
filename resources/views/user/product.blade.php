@extends('user.main')

@section('title','Product')
@endsection

@section('content')


    <section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="single-product">

                    <div class="product">

                        <div class="col_two_fifth">

                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <a href="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}}  @endif"
                                   class="fancybox-button" data-rel="fancybox-button">
                                    <img class="img-responsive"
                                         src="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}} @endif"
                                         alt="">
                                </a>

                            </div>
                            <!-- Product Single - Gallery End -->

                        </div>

                        <div class="col_two_fifth product-desc">

                            <!-- Product Single - Price
                            ============================================= -->
                            <div class="product-price">

                                <ins>{{ $product->price}} {{$product->currencyUnit->unit_name}}</ins>
                            </div>
                            <!-- Product Single - Price End -->

                            <!-- Product Single - Rating
                            ============================================= -->
                            <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                                <i class="icon-star-empty"></i>
                            </div>
                            <!-- Product Single - Rating End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            <!-- Product Single - Quantity & Cart Button
                            ============================================= -->
                            <form class="cart nobottommargin clearfix" method="post" enctype="multipart/form-data">
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" step="1" min="1" name="quantity" value="1" title="Qty"
                                           class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                                <button type="submit" class="add-to-cart button nomargin">Sepete Ekle</button>
                            </form>
                            <!-- Product Single - Quantity & Cart Button End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            <!-- Product Single - Short Description
                            ============================================= -->
                            <p>{{$product->title}}</p>

                            <p>{{$product->description}} </p>
                            <!-- Product Single - Short Description End -->


                            <!-- Product Single - Share
                            ============================================= -->
                            <div class="si-share noborder clearfix">
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
                            <!-- Product Single - Share End -->


                        </div>


                        <div class="col_full nobottommargin">

                            <div class="tabs clearfix nobottommargin ui-tabs ui-widget ui-widget-content ui-corner-all"
                                 id="tab-1">

                                <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                                    role="tablist">
                                    <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab"
                                        tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1"
                                        aria-selected="true"><a href="#tabs-1" class="ui-tabs-anchor"
                                                                role="presentation" tabindex="-1" id="ui-id-1"><i
                                                    class="icon-align-justify2"></i><span class="hidden-xs"> Ürün Açıklaması</span></a>
                                    </li>
                                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1"
                                        aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false"><a
                                                href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                                id="ui-id-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Ekstra Bilgiler</span></a>
                                    </li>
                                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1"
                                        aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false"><a
                                                href="#tabs-3" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                                id="ui-id-3"><i class="icon-star3"></i><span
                                                    class="hidden-xs"> Yorumlar</span></a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom"
                                         id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true"
                                         aria-hidden="false">
                                        <p> {{$product->description}}</p>
                                    </div>
                                    <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom"
                                         id="tabs-2" aria-labelledby="ui-id-2" role="tabpanel" aria-expanded="false"
                                         aria-hidden="true" style="display: none;">

                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>Size</td>
                                                <td>Small, Medium &amp; Large</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Pink &amp; White</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>26 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Length</td>
                                                <td>40 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>33 inches</td>
                                            </tr>
                                            <tr>
                                                <td>Fabric</td>
                                                <td>Cotton, Silk &amp; Synthetic</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty</td>
                                                <td>3 Months</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom"
                                         id="tabs-3" aria-labelledby="ui-id-3" role="tabpanel" aria-expanded="false"
                                         aria-hidden="true" style="display: none;">

                                        <div id="reviews" class="clearfix">

                                            <ol class="commentlist clearfix">

                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt=""
                                                                         src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60"
                                                                         height="60" width="60"></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">John Doe<span><a href="#"
                                                                                                         title="Permalink to this comment">April
                                                                        24, 2014 at 10:46AM</a></span></div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Quo perferendis aliquid tenetur. Aliquid, tempora, sit
                                                                aliquam officiis nihil autem eum at repellendus facilis
                                                                quaerat consequatur commodi laborum saepe non nemo nam
                                                                maxime quis error tempore possimus est quasi
                                                                reprehenderit fuga!</p>

                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-half-full"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt=""
                                                                         src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60"
                                                                         height="60" width="60"></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">Mary Jane<span><a href="#"
                                                                                                          title="Permalink to this comment">June
                                                                        16, 2014 at 6:00PM</a></span></div>
                                                            <p>Quasi, blanditiis, neque ipsum numquam odit asperiores
                                                                hic dolor necessitatibus libero sequi amet voluptatibus
                                                                ipsam velit qui harum temporibus cum nemo iste aperiam
                                                                explicabo fuga odio ratione sint fugiat consequuntur
                                                                vitae adipisci delectus eum incidunt possimus tenetur
                                                                excepturi at accusantium quod doloremque reprehenderit
                                                                aut expedita labore error atque?</p>

                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                            </ol>

                                            <!-- Modal Reviews
                                            ============================================= -->
                                            <a href="#" data-toggle="modal" data-target="#reviewFormModal"
                                               class="button button-3d nomargin fright">Add a Review</a>

                                            <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                            <h4 class="modal-title" id="reviewFormModalLabel">Submit a
                                                                Review</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="nobottommargin" id="template-reviewform"
                                                                  name="template-reviewform" action="#" method="post">

                                                                <div class="col_half">
                                                                    <label for="template-reviewform-name">Name
                                                                        <small>*</small>
                                                                    </label>

                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                    class="icon-user"></i></span>
                                                                        <input type="text" id="template-reviewform-name"
                                                                               name="template-reviewform-name" value=""
                                                                               class="form-control required">
                                                                    </div>
                                                                </div>

                                                                <div class="col_half col_last">
                                                                    <label for="template-reviewform-email">Email
                                                                        <small>*</small>
                                                                    </label>

                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">@</span>
                                                                        <input type="email"
                                                                               id="template-reviewform-email"
                                                                               name="template-reviewform-email" value=""
                                                                               class="required email form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <div class="col_full col_last">
                                                                    <label for="template-reviewform-rating">Rating</label>
                                                                    <select id="template-reviewform-rating"
                                                                            name="template-reviewform-rating"
                                                                            class="form-control">
                                                                        <option value="">-- Select One --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <div class="col_full">
                                                                    <label for="template-reviewform-comment">Comment
                                                                        <small>*</small>
                                                                    </label>
                                                                    <textarea class="required form-control"
                                                                              id="template-reviewform-comment"
                                                                              name="template-reviewform-comment"
                                                                              rows="6" cols="30"></textarea>
                                                                </div>

                                                                <div class="col_full nobottommargin">
                                                                    <button class="button button-3d nomargin"
                                                                            type="submit"
                                                                            id="template-reviewform-submit"
                                                                            name="template-reviewform-submit"
                                                                            value="submit">Submit Review
                                                                    </button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <!-- Modal Reviews End -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear"></div>
                <div class="line"></div>

                <div class="col_full nobottommargin">

                    <h4>Benzer Ürünler</h4>

                    <div id="oc-product" class="owl-carousel product-carousel owl-theme owl-loaded">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"  style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 1462.5px;">
                                @foreach ($relatedProducts as $relatedProduct)

                                    <div class="owl-item" style="width: 262.5px; margin-right: 30px;">
                                        <div class="oc-item">

                                            <div class="product iproduct clearfix">

                                                <div class="product-image">
                                                    <a href="#">
                                                        <img src={{$relatedProduct->image}} alt=""></a>
                                                    <div class="product-overlay">
                                                        <a href="#" class="add-to-cart">
                                                            <i class="icon-shopping-cart"></i>
                                                            <span> Sepete Ekle</span>
                                                        </a>
                                                        <a href="include/ajax/shop-item.html" class="item-quick-view"
                                                           data-lightbox="ajax"><i class="icon-zoom-in2"></i>
                                                            <span> Hemen Bak</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="product-desc center">
                                                    <div class="product-title">
                                                        <h3><a href="#">{{$relatedProduct->title}}</a></h3>
                                                    </div>
                                                    <div class="product-price">{{$relatedProduct->price}}</div>
                                                    <div class="product-rating">
                                                        <i class="icon-star3"></i>
                                                        <i class="icon-star3"></i>
                                                        <i class="icon-star3"></i>
                                                        <i class="icon-star-half-full"></i>
                                                        <i class="icon-star-empty"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <script type="text/javascript">

                        jQuery(document).ready(function ($) {

                            var ocProduct = $("#oc-product");

                            ocProduct.owlCarousel({
                                margin: 30,
                                nav: true,
                                navText: ['<i class="icon-angle-left"></i>', '<i class="icon-angle-right"></i>'],
                                autoplayHoverPause: true,
                                dots: false,
                                responsive: {
                                    0: {items: 1},
                                    480: {items: 2},
                                    768: {items: 3},
                                    992: {items: 4}
                                }
                            });

                        });

                    </script>

                </div>

            </div>

        </div>

    </section>


@endsection