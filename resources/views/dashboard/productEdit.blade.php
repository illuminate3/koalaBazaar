@extends('dashboard.mainSupplier')

@section('title','Product Detail')
@endsection

        @section('page_level_styles')
        <!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.css">
<link href="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
        @endsection
        
@section('page_level_content')
        <!--BEGIN PAGE LEVEL CONTENT-->
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
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" method="post" action="{{ action('Dashboard\ProductController@update',$product->id) }}">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Edit Product </span>
                                <span class="caption-helper">{{$product->title}}</span>
                            </div>
                            <div class="actions btn-set">
                                <a href="{{ action('Dashboard\ProductController@edit',$product->id) }}" class="btn btn-default  btn-circle">
                                    <i class="fa fa-reply"></i> Reset
                                </a>
                                <button type="submit" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Ürünü Düzenle</button>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_general" data-toggle="tab" aria-expanded="true">
                                            General </a>
                                    </li>

                                </ul>
                                <div class="col-md-8">
                                <div class="tab-content no-space">

                                    <div class="tab-pane active" id="tab_general">

                                        <div class="form-body" action="{{ action('Dashboard\ProductController@update'),$product->id }}" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Title: <span class="required">
														* </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="title" value="{{$product->title}}"placeholder="product title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Description: <span class="required">
														 </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="description"> {!! $product->description !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Price: <span class="required">
														* </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Current Unit <span class="required">
														* </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <select class="table-group-action-input form-control input-medium" name="current_unit">
                                                        <option value="">Select...</option>
                                                        @foreach($currency_units as $curunit)
                                                        <option value="{{ $curunit->id }}" @if($product->currency_unit_id == $curunit->id) selected @endif>{{ $curunit->unit_name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Status: <span class="required">
														* </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <select class="table-group-action-input form-control input-medium" name="is_active">

                                                        <option value="1" @if($product->is_active) selected @endif>Active</option>
                                                        <option value="0" @if(!$product->is_active) selected @endif>Not Active</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col_full nobottommargin right" align="right">
                                        </div>
                                    </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <a href="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}}  @endif" class="fancybox-button" data-rel="fancybox-button">
                                        <img class="img-responsive" src="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}} @endif" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--END PAGE LEVEL CONTENT-->
@endsection

@section('page_level_plugins')
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="{{asset('/dashboard')}}/assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
@endsection

@section('page_level_scripts')
    <script src="{{asset('/dashboard')}}/assets/global/scripts/datatable.js"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/ecommerce-products-edit.js"></script>
    @endsection
