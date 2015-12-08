@extends('dashboard.mainSupplier')

@section('title','Odeme Bilgisi Ekle')
@endsection

@section('page_level_styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
@endsection

@section('page_level_content')

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
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Ödeme Bilgisi Ekleyin
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
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="{{action('Dashboard\PaymentInfoController@store')}}" method="post"class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Ödeme Bilgisi</h3>

                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Adı</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-md-5">Ödeme Bilgisi Detayları</label>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="wysihtml5 form-control" name="detail"
                                                  rows="6"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--/row-->
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Ödeme Bilgisi Ekle</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>

    @endsection

    @section('page_level_plugins')
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript"
            src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript"
            src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

@endsection


@section('page_level_scripts')

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