@extends ('dashboard.main')
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
        <div class="col-md-6 col-sm-6">
            <div class="acc_content clearfix">
                <form id="update-form" name="update-form" class="nobottommargin" action="#" method="post">
                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-user"></i>
                </span>
                            <input class="form-control placeholder-no-fix input-circle-right" type="text"
                                   autocomplete="off" placeholder="Username" name="username">
                        </div>
                    </div>
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
                                   name="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Surname"
                                   name="surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-phone"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-envelope"></i>
                                    </span>
                            <input type="text" class="form-control input-circle-right" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="col_full nobottommargin rigt" align="right">
                        <input type="submit" value="düzenle" style="color:green;  font-family: fantasy; font-size:150%">

                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <img alt="" src="{{asset('/dashboard')}}/images/koala.jpg" class="img-responsive"/>
        </div>
    </div>
@stop