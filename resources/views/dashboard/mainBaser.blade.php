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
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="{{asset('/dashboard')}}/assets/global/css/components.css" id="style_components" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/dashboard')}}/assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{asset('/dashboard')}}/assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @section('page_level_styles')
    @show
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">

@section('body')
@show

        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset('/dashboard')}}/assets/global/plugins/respond.min.js"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
<script src="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->


@section('page_level_scripts')
@show

<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        Demo.init(); // init demo features
        QuickSidebar.init(); // init quick sidebar
        Index.init();
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Tasks.initDashboardWidget();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>