@extends('dashboard.mainSupplier')

@section('title','Onay Bekleyen Ödeme')
@endsection


@section('page_level_content')
    <form id="billing-form" name="billing-form" class="nobottommargin" action="{{ action('Dashboard\SupplierController@confirmPayment',$payment->id)}}" method="post">

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="portlet blue-hoki box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>Müşteri Bilgileri
                    </div>
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> Edit </a>
                    </div>
                </div>


                <div class="portlet-body">
                    <div class="row static-info">
                        <div class="col-md-5 name">
                            İsim:
                        </div>
                        <div class="col-md-7 value">
                          {{$customer->user->name}}    {{$customer->user->surname}}
                        </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-5 name">
                            Email:
                        </div>
                        <div class="col-md-7 value">
                            {{$customer->user->email}}
                        </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-5 name">
                            Telefon:
                        </div>
                        <div class="col-md-7 value">
                            {{$customer->phone}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="portlet red-sunglo box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-money"></i>Ödeme Seçeneği
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row static-info">
                        <div class="col-md-12 value">
                            {!! $paymentInfo->title !!}<br>
                            {!! $paymentInfo->detail !!}<br>
                        </div>
                        <div class="col-md-12 value">
                            NOT: <br>
                            {{$payment->text}}<br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet green box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket"></i>Ödeme Bekleyen Alışverişi
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
                            @foreach($checkOuts as $checkout)
                            <tr>
                                <td>
                                    <a href="#" target="_blank">
                                       {{$checkout->product_title}} </a>
                                </td>
                                <td>
                                    {{$checkout->description}}
                                </td>
                                <td>
                                    {{$checkout->product_price}}
                                </td>
                                <td>
                                    {{$checkout->count}}
                                </td>
                                <td>
                                    {{$checkout->product_price * $checkout->count}}
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
        <button type="submit" class="btn blue pull-right"><i class="fa fa-check"></i> Ödemeyi Onaylayın</button>
    </div>
    </form>
@endsection