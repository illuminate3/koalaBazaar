@extends('dashboard.customer.mainCustomer')

@section('title','Ödeme Bekleyenler')
@endsection


@section('page_level_content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Ödeme Bekleyen Alışverişleriniz
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
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
                            @foreach($checkouts as $checkout)
                            <?php $supplier= \App\Supplier::where('id',$checkout->supplier_id)->first();?>
                            <tr>
                                <td class="highlight">
                                    <div class="success">
                                    </div>
                                    <a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}">
                                       {{$supplier->shop_name }} </a>
                                </td>
                                <td>
                                    {{$checkout->total}} TRY
                                </td>
                                <td>
                                    <a href="{{action('Dashboard\CustomerController@showOrderDetail',$supplier->id)}}" class="btn default btn-xs purple">
                                        <i class="fa fa-edit"></i> İncele </a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>

    @endsection