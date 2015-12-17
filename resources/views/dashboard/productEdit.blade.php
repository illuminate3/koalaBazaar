@extends('dashboard.mainSupplier')

@section('title','Ürün Detayı')
@endsection

@section('page_level_styles')
        <!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.css">
<link href="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"
      type="text/css">
<link rel="stylesheet" type="text/css"
      href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

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
        <form class="form-horizontal form-row-seperated" method="post"
              action="{{ action('Dashboard\ProductController@update',$product->id) }}">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Ürün Düzenle </span>
                        <span class="caption-helper">{{$product->title}}</span>
                    </div>
                    <div class="actions btn-set">
                        <a href="{{ action('Dashboard\ProductController@edit',$product->id) }}"
                           class="btn btn-default  btn-circle">
                            <i class="fa fa-reply"></i> Reset
                        </a>
                        <button type="submit" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Ürünü
                            Düzenle
                        </button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab" aria-expanded="true">
                                    Genel </a>
                            </li>

                        </ul>
                        <div class="col-md-8">
                            <div class="tab-content no-space">

                                <div class="tab-pane active" id="tab_general">

                                    <div class="form-body"
                                         action="{{ action('Dashboard\ProductController@update'),$product->id }}"
                                         method="post">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Ürün Adı: <span class="required">
														* </span>
                                            </label>

                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="title"
                                                       value="{{$product->title}}" placeholder="product title">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fiyat: <span class="required">
														* </span>
                                            </label>

                                            <div class="col-md-10">
                                                <input type="text" class="form-control" value="{{$product->price}}"
                                                       name="price" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Kategoriler: <span class="required">
														* </span>
                                            </label>

                                            <div class="col-md-10">
                                                <div class="form-control height-auto">
                                                    <div class="scroller" data-always-visible="1">
                                                        <ul class="list-unstyled">
                                                            @foreach($categories as $category)
                                                                <li>
                                                                    <label><input type="checkbox" name="categories[]"
                                                                                  @if($product->categories()->find($category->id)))
                                                                                  checked
                                                                                  @endif value="{{ $category->id }}">{{ $category->title }}
                                                                    </label>

                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
															<span class="help-block">
															bir veya daha fazla kategori seçebilirsiniz </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Durum: <span class="required">
														* </span>
                                            </label>

                                            <div class="col-md-10">
                                                <select class="table-group-action-input form-control input-medium"
                                                        name="is_active">

                                                    <option value="1" @if($product->is_active) selected @endif>Aktif
                                                    </option>
                                                    <option value="0" @if(!$product->is_active) selected @endif>Deaktif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Ürün Açıklaması:</label>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea class="wysihtml5 form-control" name="description"
                                                                  rows="6">{!! $product->description !!} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col_full nobottommargin right" align="right">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <img class="img-responsive"
                                 src="@if($product->image!=null) {{ action('FileEntryController@show',$product->image)}}@else {{$product->instagram->image_url}} @endif"
                                 alt="">
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
    <script type="text/javascript"
            src="{{asset('/dashboard')}}/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript"
            src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script src="{{asset('/dashboard')}}/assets/global/plugins/plupload/js/plupload.full.min.js"
            type="text/javascript"></script>
@endsection

@section('page_level_scripts')
    <script src="{{asset('/dashboard')}}/assets/global/scripts/datatable.js"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/ecommerce-products-edit.js"></script>
    <script>
        jQuery(document).ready(function () {
            if (!jQuery().wysihtml5) {
                return;
            }

            if ($('.wysihtml5').size() > 0) {
                $('.wysihtml5').wysihtml5({
                    "stylesheets": ["{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
                });
            }
        });
    </script>
@endsection
