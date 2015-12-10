@extends('dashboard.customer.mainCustomer')

@section('title','Ödeme Bekleyenler')
@endsection


@section('page_level_content')
    <div class="row">
        <div class="col-md-10">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Ödeme Bekleyen Alışverişleriniz
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <i class="fa fa-briefcase"></i> Satıcı Firma
                                </th>
                                <th>
                                    <i class="fa fa-shopping-cart"></i> Tutar
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="highlight">
                                    <div class="success">
                                    </div>
                                    <a href="javascript:;">
                                        RedBull </a>
                                </td>
                                <td>
                                    2560.60$
                                </td>
                                <td>
                                    <a href="{{action('Dashboard\CustomerController@showOrderDetail')}}" class="btn default btn-xs purple">
                                        <i class="fa fa-edit"></i> İncele </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="info">
                                    </div>
                                    <a href="javascript:;">
                                        Google </a>
                                </td>
                                <td>
                                    560.60$
                                </td>
                                <td>
                                    <a href="{{action('Dashboard\CustomerController@showOrderDetail')}}" class="btn default btn-xs purple">
                                        <i class="fa fa-edit"></i> İncele </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="success">
                                    </div>
                                    <a href="javascript:;">
                                        Apple </a>
                                </td>
                                <td>
                                    3460.60$
                                </td>
                                <td>
                                    <a href="{{action('Dashboard\CustomerController@showOrderDetail')}}" class="btn default btn-xs purple">
                                        <i class="fa fa-edit"></i> İncele </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="warning">
                                    </div>
                                    <a href="javascript:;">
                                        Microsoft </a>
                                </td>
                                <td>
                                    2560.60$
                                </td>
                                <td>
                                    <a href="{{action('Dashboard\CustomerController@showOrderDetail')}}" class="btn default btn-xs purple">
                                        <i class="fa fa-edit"></i> İncele </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>

    @endsection