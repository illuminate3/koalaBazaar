<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/style.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('/user')}}/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="{{asset('/user')}}/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Start Page Level Style -->
    @section('page_level_styles')
    @show
    <!-- End Page Level Style -->
    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{asset('/user')}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{asset('/user')}}/js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>
</head>

<body class="stretched">
@section('body')


@show
<script type="text/javascript" src="{{asset('/user')}}/js/functions.js"></script>
</body>
</html>