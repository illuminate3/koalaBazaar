@extends ('dashboard.main')
@section('title')
    Edit Profile
@stop

@section('body')


@section('page_level_portlets')
    <h3 class="page-title">
        <b> profiliniz </b>
        <b><i class="fa fa-hand-o-down fa-lg"></i></b>
    </h3>
    <div class="row">
        <div class="col-md-6">

            @if($errors->updater->has())
                @foreach ($errors->updater->all() as $error)
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

                <div class="portlet box ">

            <div class="acc_content clearfix">
                <form id="update-form" name="update-form" class="nobottommargin" action="{{ action('Dashboard\SupplierController@update') }}" method="post">
                            <h4> {{ $user->userable->shop_name }} </h4>



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
                            <input type="text" class="form-control input-circle-right" placeholder="Phone" name="phone"  value="{{ $user->userable->phone }}">
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

                            <select class="form-control select2me select2-offscreen  circle-right" name="country" tabindex="-1" title="">
                                <option value="">Ülke Seçin..</option>
                                <option value="Option 1">Türkiye</option>
                                <option value="Option 2">Danimarka</option>
                                <option value="Option 3">Option 3</option>
                                <option value="Option 4">Option 4</option>
                            </select>
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
                        <input type="submit" value="düzenle">
                    </div>
                </form>
            </div>
        </div>
                </div>



                <div class="col-md-6">
                    @if($errors->updatePassword->has())
                        @foreach ($errors->updatePassword->all() as $error)
                            <div class="alert alert-danger">
                                <i class="icon-remove-sign"></i>{{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="acc_content clearfix">
                        <form id="update-password-form" name="update-password-form" class="nobottommargin" action="{{ action('Dashboard\SupplierController@updatePassword') }}" method="post">
                            <h4> Parolamı Değiştir</h4>


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
                            <div class="col_full nobottommargin right" align="right">
                                <input type="submit" value="Değiştir">
                            </div>
                            </form>
                    </div>

                </div>
        </div>


@stop

@section('page_level_scripts')
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @stop

