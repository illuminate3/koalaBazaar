@extends('dashboard.mainSupplier')

@section('title','Onay Bekleyen Ödemeler')
@endsection


@section('page_level_content')
    <div class="row">
        <div class="col-md-10">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Onay Bekleyen Ödemeler
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
                                    <i class="fa fa-briefcase"></i> Müşteri
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
                                           İsim </a>
                                    </td>
                                    <td>
                                        Total TL
                                    </td>
                                    <td>
                                        <a href="{{action('Dashboard\SupplierController@waitingPaymentDetail')}}" class="btn default btn-xs purple">

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