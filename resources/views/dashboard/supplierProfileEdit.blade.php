@extends ('dashboard.main')
@section('title','Edit Profile')
    @endsection

        <!-- BEGIN PAGE LEVEL CONTENT-->
@section('page_level_content')
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
        <div class="col-md-8">

            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">Kişisel Bilgiler</a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab">Fotoğraf Değiştir</a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab">Parola Değiştir</a>
                        </li>
                        <li>
                            <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_1_1">
                            <form id="update-form" name="update-form" class="nobottommargin" action="{{action('Dashboard\SupplierController@update')}}" method="post">

                            <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" value="{{$user->name}}" class="form-control" name="firstname">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" value="{{$user->surname}}" class="form-control" name="surname">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text" value="{{$user->phone}}" class="form-control" name="phone">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" value="{{$user->email}}" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1" name="country">
                                        <option value="">Select...</option>
                                        <option value="TR">Türkiye</option>
                                        <option value="FR">Fransa</option>
                                        <option value="USA">Amerika Birleşik Devletleri</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">City</label>
                                    <input type="text"  class="form-control" name="city">
                                </div>


                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Social Links</label>
                                    <input type="text" placeholder="Facebook, Twitter, Instagram..." class="form-control" name="social_links">
                                </div>

                                <div class="margiv-top-10">
                                    <button type="submit" class="btn default btn green">
                                        <i class="fa fa-check"></i> Profili Düzenle</button>

                                    <a href="javascript:;" class="btn default">
                                        Cancel </a>
                                </div>
                            </form>
                        </div>
                        <!-- END PERSONAL INFO TAB -->
                        <!-- CHANGE AVATAR TAB -->
                        <div class="tab-pane" id="tab_1_2">
                            <p>Fotoğraflarınızı güncelleyin  </p>
                            <form id="update-images-form" name="update-images-form" class="nobottommargin" action="{{action('Dashboard\SupplierController@updateImages')}}#tab_1_2" method="post">

                            <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput" name="cover_image">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
																	<span class="btn default btn-file">
																	<span class="fileinput-new">
																	Select image </span>
																	<span class="fileinput-exists">
																	Change </span>
																	<input type="file" name="cover_image">
																	</span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger">NOTE! </span>
                                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                    </div>
                                </div>
                                <div class="margin-top-10">
                                    <button type="submit" class="btn default btn green">
                                        <i class="fa fa-check"></i> Kapak Fotoğrafını Düzenle</button>
                                    <a href="javascript:;" class="btn default">
                                        Cancel </a>
                                </div>
                            </form>
                        </div>
                        <!-- END CHANGE AVATAR TAB -->
                        <!-- CHANGE PASSWORD TAB -->
                        <div class="tab-pane" id="tab_1_3">
                            <form id="update-password-form" name="update-password-form" class="nobottommargin" action="{{action('Dashboard\SupplierController@updatePassword')}}#tab_1_3" method="post">

                                <div class="form-group">
                                    <label class="control-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Re-type New Password</label>
                                    <input type="password" class="form-control" name="rpassword">
                                </div>
                                <div class="margin-top-10">
                                    <button type="submit" class="btn default btn green">
                                        <i class="fa fa-check"></i> Parolamı Değiştir</button>
                                    <a href="javascript:;" class="btn default">
                                        Cancel </a>
                                </div>
                            </form>
                        </div>
                        <!-- END CHANGE PASSWORD TAB -->
                        <!-- PRIVACY SETTINGS TAB -->
                        <div class="tab-pane" id="tab_1_4">
                            <form action="#">
                                <table class="table table-light table-hover">
                                    <tbody><tr>
                                        <td>
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
                                        </td>
                                        <td>
                                            <label class="uniform-inline">
                                                <div class="radio"><span><input type="radio" name="optionsRadios1" value="option1"></span></div>
                                                Yes </label>
                                            <label class="uniform-inline">
                                                <div class="radio"><span class="checked"><input type="radio" name="optionsRadios1" value="option2" checked=""></span></div>
                                                No </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                        </td>
                                        <td>
                                            <label class="uniform-inline">
                                                <div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                        </td>
                                        <td>
                                            <label class="uniform-inline">
                                                <div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                        </td>
                                        <td>
                                            <label class="uniform-inline">
                                                <div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
                                        </td>
                                    </tr>
                                    </tbody></table>
                                <!--end profile-settings-->
                                <div class="margin-top-10">
                                    <a href="javascript:;" class="btn green-haze">
                                        Save Changes </a>
                                    <a href="javascript:;" class="btn default">
                                        Cancel </a>
                                </div>
                            </form>
                        </div>
                        <!-- END PRIVACY SETTINGS TAB -->
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <!-- BEGIN PROFILE SIDEBAR -->
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{$user->userable->profile_image}}" class="img-responsive" alt="">
                    </div>
                    <div class="cover-userpic">
                        <img src="{{$user->userable->cover_image}}" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$user->userable->shop_name}}
                        </div>

                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="extra_profile.html">
                                    <i class="icon-home"></i>
                                    Overview </a>
                            </li>
                            <li class="active">
                                <a href="extra_profile_account.html">
                                    <i class="icon-settings"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="page_todo.html" target="_blank">
                                    <i class="icon-check"></i>
                                    Tasks </a>
                            </li>
                            <li>
                                <a href="extra_profile_help.html">
                                    <i class="icon-info"></i>
                                    Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->

            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->

</div>
@endsection
        <!-- END PAGE LEVEL CONTENT-->


@section('page_level_plugins')
    <script src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    @endsection

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_scripts')
    <script src="{{asset('/dashboard')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
@endsection
        <!-- END PAGE LEVEL SCRIPTS -->

