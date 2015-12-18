@extends('dashboard.customer.mainCustomer')

@section('title','Sipariş-Ödeme Detayı')
@endsection

@section('page_level_content')
    <form id="billing-form" name="billing-form" class="nobottommargin" action="{{ action('Dashboard\CustomerController@submitPayment') }}" method="post">

        <div class="row">
            <h4 class="page-title">{{$supplier->shop_name}} ile ödeme bekleyen alışverisleriniz</h4>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet blue box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-basket"></i>Ürünleriniz
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Ürün Adı
                                    </th>
                                    <th>
                                        Ürün Açıklaması
                                    </th>
                                    <th>
                                        Ürün Resmi
                                    </th>
                                    <th>
                                        Fiyatı
                                    </th>
                                    <th>
                                        Miktarı
                                    </th>
                                    <th>
                                        Toplam Tutar
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <input type="hidden" name="checkouts[]" value="{{ $order->id }}">
                                <tr>
                                    <td>
                                        <a href="{{action('Frontend\ProductController@show',['id'=>$order->product_id])}}" target="_blank">
                                            {{$order->product->title}} </a>
                                    </td>
                                    <td>
                                        {!! $order->product->description !!}
                                    </td>
                                    <td>
                                        <img class="img-responsive" src="@if($order->product->image!=null) {{ action('FileEntryController@show',$order->product->image)}}@else {{$order->product->instagram->image_url}}  @endif" style="width: 100px;" alt="">
                                    </td>
                                    <td>
                                        {{$order->product->price}} TRY
                                    </td>
                                    <td>
                                        {{$order->count}}
                                    </td>
                                    <td>
                                        {{$order->product->price * $order->count }} TRY
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($paymentInfos as $paymentInfo)
            <div class="col-md-6 col-sm-12">
                <div class="portlet red-sunglo box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Ödeme Seçeneği
                        </div>
                        <div class="actions">
                            <label>
                                <input type="radio" name="payment_option" value="{{ $paymentInfo->id }}" class="icheck"></label>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-12 value">
                                {{$paymentInfo->title}}<br>
                               {!! $paymentInfo->detail !!}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>Notunuz
                        </div>
                    </div>
                    <textarea class="form-control" rows="9" name="note"> {{ old('note') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn blue pull-right"><i class="fa fa-check"></i> Ödemeyi Yapın</button>
        </div>


    </form>
@endsection