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
                            @foreach($checkouts as $checkout)
                            <tr>
                                <td>
                                    {{$checkout->supplier->shop_name}}
                                </td>
                                <td>
                                    <a href="javascript:;">
                                        {{$checkout->product_title}} </a>
                                </td>
                                <td>
                                    {{$checkout->description}}
                                </td>
                                <td>
                                        <img class="img-responsive" src="@if($checkout->image!=null) {{ action('FileEntryController@show',$checkout->image)}}@else {{$checkout->product->image->image_url}}  @endif" style="width: 100px;" alt="">

                                </td>
                                <td>
                                    {{$checkout->product->price}}
                                </td>
                                <td>
                                    {{$checkout->count}}
                                </td>
                                <td>
                                    {{$checkout->product->price * $checkout->count}}
                                </td>
                            </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <ul class="pagination topmargin nobottommargin pull-right">
                    <li @if(1==$paginator->currentPage()) class="disabled" @endif><a
                                href="{{ $paginator->url(1) }}">«</a></li>
                    @for ($i = 1 ; $i <=$paginator->lastPage(); $i++)
                        <li @if($i==$paginator->currentPage()) class="active" @endif ><a
                                    href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li @if($paginator->lastPage()==$paginator->currentPage()) class="disabled" @endif><a
                                href="{{ $paginator->url($paginator->lastPage()) }}">»</a></li>
                </ul>
            </div>
        </div>
    </div>



    @endsection