@extends('dashboard.main')

@section('title','Product Detail')
@endsection

@section('page_level_content')
        <!--BEGIN PAGE LEVEL CONTENT-->
        <div class="row">
            <div class="col-md-12">
                @if($errors->updateProduct->has())
                    @foreach ($errors->updateProduct->all() as $error)
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
                <form class="form-horizontal form-row-seperated" action="{{ action('Dashboard\ProductController@update',$product->id) }}">
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
                                                    <textarea class="form-control" name="description"></textarea>
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
                                                        <option value="TRY">TRY</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EUR">EUR</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Status: <span class="required">
														* </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <select class="table-group-action-input form-control input-medium" name="is_active">
                                                        <option value="">Select...</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Not Active</option>
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
                                    <img class="img-responsive" src="{{$product->image}}" style="width: 130px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--END PAGE LEVEL CONTENT-->
@endsection


