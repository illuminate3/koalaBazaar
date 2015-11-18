@extends ('dashboard.mainBaser')
@extends('dashboard.pageBaser')
@section('title')
    Edit Profile
@stop

@section('body')


@section('page_level_portlets')
    <h3 class="page-title" style="font-family:fantasy; font-size:200%">
        <b> p r o f i l i n i z </b>
        <b><i class="fa fa-hand-o-down fa-lg"></i></b>
    </h3>
    <div class="row">
        <div class="col-md-6">
            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <i class="icon-remove-sign"></i>{{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="acc_content clearfix">
                <form id="update-form" name="update-form" class="nobottommargin" action="{{ action('Dashboard\SupplierController@update') }}" method="post">
                            <h4> {{ $user->userable->shop_name }} </h4>
                            <h4>{{$user->userable->profile_image}}</h4>



                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-lock"></i>
                </span>
                            <input class="form-control placeholder-no-fix input-circle-right" type="password"
                                   autocomplete="off" id="register_password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-lock"></i>
                </span>
                            <input class="form-control placeholder-no-fix input-circle-right" type="password"
                                   autocomplete="off" id="register_password" placeholder="Re-type your password"
                                   name="rpassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Name"
                                   name="firstname" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Surname"
                                   name="surname" value="{{ $user->surname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-phone"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Phone" name="phone" value="{{ $user->userable->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-envelope"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Email" name="email" value="{{$user->email}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-font"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Country" name="country" value="{{$user->userable->country}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-font"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="City" name="city" value="{{$user->userable->city}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-font"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Description" name="description" value="{{$user->userable->description}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                              <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-font"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Social Links" name="social_links" src="{{$user->userable->social_links}}">
                        </div>
                    </div>


                    <div class="col_full nobottommargin right" align="right">
                        <input type="submit" value="düzenle" style="color:green;  font-family: fantasy; font-size:150%">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <i class="icon-remove-sign"></i>{{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="acc_content clearfix">
                <form id="update-images-form" name="update-images-form" class="nobottommargin" action="{{ action('Dashboard\SupplierController@update') }}" method="post">

                    <div class="form-group">
                        <div class="input-group">

                                <input type="image" placeholder="Profile Image" name="profile_image" src="{{$user->userable->profile_image}}">
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="input-group">

                            <input type="image" placeholder="Cover Image" name="cover_image" src="{{$user->userable->cover_image}}">
                        </div>
                    </div>
                    <div class="col_full nobottommargin right" align="right">
                        <input type="submit" value="Fotoğrafları Degistir" style="color:green;  font-family: fantasy; font-size:150%">
                    </div>
                    </form>
                    </div>



    </div>
        </div>
@stop

@section('page_level_scripts')
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('/dashboard')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @stop