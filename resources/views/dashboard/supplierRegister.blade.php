
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Login Options - Login Form 4</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('/dashboard')}}/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset('/dashboard')}}/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->


<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{{asset('/dashboard')}}/assets/admin/layout2/img/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">


    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="{{ action('User\SupplierController@store') }}" method="post" style="display: block;">
        <h3>Sign Up</h3>
        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" style="display: block;">
                    <button class="close" data-close="alert"></button>
			        <span>{{ $error }} </span>
                </div>
            @endforeach
        @endif

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                <input type="text" class="form-control input-circle-right" placeholder="Name" name="firstname" value="{{ old('firstname') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                <input type="text" class="form-control input-circle-right" placeholder="Surname" name="surname" value="{{ old('surname') }}">
            </div>
        </div>

        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-gift"></i>
                </span>

                <input type="text" class="form-control input-circle-right" placeholder="Shop Name" name="shopname" value="{{ $userInfo->user->full_name }}">

            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-envelope"></i>
                </span>

                <input type="text" class="form-control input-circle-right" placeholder="Email" value="{{ old('shopemail') }}" name="shopemail">

            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-lock"></i>
                </span>
                <input class="form-control placeholder-no-fix input-circle-right" type="password" autocomplete="off"  placeholder="Password" name="pass">
            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon input-circle-left">
                    <i class="fa fa-lock"></i>
                </span>
                <input class="form-control placeholder-no-fix input-circle-right" type="password" autocomplete="off" placeholder="Re-type your password" name="repass">
            </div>
        </div>


        <div class="form-actions">
            <input type="submit" class="btn blue">
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2014 &copy; Metronic - Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset('/dashboard')}}/assets/global/plugins/respond.min.js"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('/dashboard')}}/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('/dashboard')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
        // init background slide images
        $.backstretch([
                    "{{asset('/dashboard')}}/assets/admin/pages/media/bg/1.jpg",
                    "{{asset('/dashboard')}}/assets/admin/pages/media/bg/2.jpg",
                    "{{asset('/dashboard')}}/assets/admin/pages/media/bg/3.jpg",
                    "{{asset('/dashboard')}}/assets/admin/pages/media/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 8000
                }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>