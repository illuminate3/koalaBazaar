@extends('dashboard.mainSupplier')

@section('title','Onay Bekleyen Ödeme')
@endsection


@section('page_level_content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet green box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Ödeme Bekleyen Ürün
                    </div>
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> Edit </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Müşteri
                                </th>
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

                            <tr>
                                <td>
                                   müşteri adı
                                </td>

                                <td>
                                    <a href="#" target="_blank">
                                        Ürün baslıgı </a>
                                </td>
                                <td>
                                    ürün acıklaması
                                </td>
                                <td>
                                    <img class="img-responsive" src="" style="width: 100px;" alt="">
                                </td>
                                <td>
                                    ürün fiyatı
                                </td>
                                <td>
                                    2
                                </td>
                                <td>
                                    2.00$
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection