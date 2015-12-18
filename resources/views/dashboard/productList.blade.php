@extends('dashboard.mainSupplier')

@section('title','Ürünlerim')
@endsection
@section('page_level_styles')
        <!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.css">
<link rel="stylesheet" type="text/css" href="{{asset('/dashboard')}}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css">
<link href="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
@endsection
        
@section('page_level_content')
        <!-- BEGIN PAGE LEVEL CONTENT-->
<div class="row">
    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <i class="icon-remove-sign"></i>{{ $error }}
            </div>
        @endforeach
    @endif
    @if(\Illuminate\Support\Facades\Session::has('success'))
        @foreach (\Illuminate\Support\Facades\Session::pull('success') as $success)
            <div class="alert alert-success">
                <i class="icon-remove-sign"></i>{{ $success }}
            </div>
        @endforeach
    @endif
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet box red">
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
                                       Ürün id
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
                                       Durum
                                    </th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="detaylı duzenle" style="width: 139px;">
                                        Detaylı düzenle
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->id}}
                                        </td>
                                        <td>
                                            <a href="javascript:;">
                                                {{$product->title}} </a>
                                        </td>
                                        <td>
                                            {!!$product->description!!}
                                        </td>
                                        <td>
                                            <a href="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}}  @endif" class="fancybox-button" data-rel="fancybox-button">
                                                <img class="img-responsive" src="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}}  @endif" style="width: 100px;" alt="">
                                            </a>
                                        </td>
                                        <td>

                                            @if($product->is_active)
                                                <span class="label label-xl label-success">
										Aktif </span>


                                            @else
                                                <span class="label label-sm label-default">
										Deaktif </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ action('Dashboard\ProductController@edit',$product->id) }}" class="btn default btn-xs purple">
                                                Düzenle
                                            </a>
                                            @if($product->is_active)
                                                <a href="{{ action('Dashboard\ProductController@setAsDeactive',$product->id) }}" class="btn default btn-xs default">
                                                    Deaktive et
                                                </a>
                                            @else
                                                <a href="{{ action('Dashboard\ProductController@setAsActive',$product->id)}}" class="btn default btn-xs green">
                                                    Aktive et
                                                </a>
                                            @endif
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
</div>
@endsection
        <!-- END PAGE LEVEL CONTENT-->

@section('page_level_plugins')

    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>

@endsection

@section('page_level_scripts')
    <script src="{{asset('/dashboard')}}/assets/global/scripts/datatable.js"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/ecommerce-products-edit.js"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/table-managed.js"></script>

@endsection

