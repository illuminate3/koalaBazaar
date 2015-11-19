@extends('dashboard.main')
@section('title')
    Product List
    @stop

@section('body')
    @section('page_level_portlets')


<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
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

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Ürünleriniz
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
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green">
                                    Ürün Ekle <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">

                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover" id="product_list">
                    <thead>
                    <tr>
                        <th class="table-checkbox">
                            <input type="checkbox" class="group-checkable" data-set="#product_list .checkboxes"/>
                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            title
                        </th>
                        <th>
                            description
                        </th>
                        <th>
                            image
                        </th>
                        <th>
                            is_active
                        </th>
                        <th>
                           düzenle
                        </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($products as $product)

                    <tr class="odd gradeX">
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
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

    @stop
@stop