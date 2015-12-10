@extends('dashboard.customer.mainCustomer')

@section('title','Sipariş Geçmişim - KoalaBazaar')
@endsection


@section('page_level_content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket"></i>Sipariş Geçmişiniz
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Satıcı
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
                                    B Butik
                                </td>
                                <td>
                                    <a href="javascript:;">
                                        Product 1 </a>
                                </td>
                                <td>
								<span class="label label-sm label-success">
									Available </span>
                                </td>
                                <td>
                                    345.50$
                                </td>
                                <td>
                                    345.50$
                                </td>
                                <td>
                                    2
                                </td>
                                <td>
                                    2.00$
                                </td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection