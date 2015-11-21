@extends('dashboard.main')

@section('title','Product List')
@endsection

@section('page_level_content')
        <!-- BEGIN PAGE LEVEL CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-diamond"></i>Ürünleriniz
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">

                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <div class="dataTables_length" id="sample_1_length">
                                <label>Show
                                    <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline">
                                        <option value="5">5</option><option value="15">15</option><option value="20">20</option>
                                        <option value="-1">All</option></select> records</label>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div id="sample_1_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" aria-controls="sample_1">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="products_table">
                            <thead>
                            <tr role="row">
                                <th class="table-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 24px;">
                                    <div class="checker">
                                        <span>
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></span></div>
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id: activate to sort column ascending" style="width: 41px;">
                                    Ürün id
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="title" style="width: 87px;">
                                    Title
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="description" style="width: 150px;">
                                    Description
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="image" style="width: 150px;">
                                    image
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status" style="width: 139px;">
                                    Status
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="detaylı duzenle" style="width: 139px;">
                                    Detaylı düzenle
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($products as $product)

                                <tr class="odd gradeX" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        {{ $product->title }}
                                    </td>

                                    <td class="center">
                                        {{ $product->description }}
                                    </td>

                                    <td>
                                        <img src="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}}  @endif" style="width: 130px;">
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

                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">
                                Showing 1 to 5 of all records
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                <ul class="pagination" style="visibility: visible;">
                                    <li class="prev disabled">
                                        <a href="#" title="First">
                                            <i class="fa fa-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="prev disabled">
                                        <a href="#" title="Prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="#">1</a></li>
                                    <li>
                                        <a href="#">2</a></li>
                                    <li>
                                        <a href="#">3</a></li>
                                    <li>
                                        <a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next">
                                        <a href="#" title="Next"><i class="fa fa-angle-right"></i></a>
                                    </li>
                                    <li class="next">
                                        <a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
        <!-- END PAGE LEVEL CONTENT-->


@section('page_level_plugins')
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
@endsection

@section('page_level_scripts')
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/table-managed.js"></script>
@endsection

