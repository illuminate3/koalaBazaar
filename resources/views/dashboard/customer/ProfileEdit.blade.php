@extends ('dashboard.customer.mainCustomer')
@section('title','Edit Your Addresses')
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
                          <a href="#tab_1_2" data-toggle="tab">Parola Değiştir</a>
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
                                  <input type="text" value="{{$user->userable->phone}}" class="form-control" name="phone">
                              </div>

                              <div class="form-group">
                                  <label class="control-label">Email</label>
                                  <input type="text" value="{{$user->email}}" class="form-control" name="email">
                              </div>

                              <div class="form-group"></div>

                              <div class="form-group"></div>


                              <div class="form-group"></div>

                              <div class="form-group"></div>

                              <div class="margiv-top-10">
                                  <button type="submit" class="btn default btn green">
                                      <i class="fa fa-check"></i> Profili Düzenle</button>

                                  <a href="javascript:;" class="btn default">
                                      Cancel </a>
                              </div>
                          </form>
                      </div>
                      <!-- END PERSONAL INFO TAB -->
                      <!-- CHANGE PASSWORD TAB -->
                      <div class="tab-pane" id="tab_1_2">
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
                      <div class="tab-pane" id="tab_1_4"></div>
                      <!-- END PRIVACY SETTINGS TAB -->
                  </div>
              </div>
          </div>

      </div>

      <div class="col-md-4"></div>
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
    <script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
    @endsection
            <!-- END PAGE LEVEL SCRIPTS -->

