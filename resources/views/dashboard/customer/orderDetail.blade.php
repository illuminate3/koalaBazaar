@extends('dashboard.customer.mainCustomer')

@section('title','Hoşgeldiniz - KoalaBazaar')
@endsection

@section('page_level_content')
    <form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">

        <div class="row">
            <h3 class="page-title">Firmadan Alısverisleriniz</h3>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet grey-cascade box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Ürünleriniz
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

        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="portlet red-sunglo box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Ödeme Seçeneği
                        </div>
                        <div class="actions">
                            <label>
                                <input type="radio" name="radio1" class="icheck"></label>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-12 value">
                                Jhon Done<br>
                                #24 Park Avenue Str<br>
                                New York<br>
                                Connecticut, 23456 New York<br>
                                United States<br>
                                T: 123123232<br>
                                F: 231231232<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Notunuz
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