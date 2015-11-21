@extends('dashboard.main')

@section('title','Home')
@endsection

@section('page_level_styles')
    <link href="{{asset('/dashboard')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/dashboard')}}/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/dashboard')}}/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css">

    @endsection

@section('page_level_content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar" style="width: 300px;">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{$user->userable->profile_image}}" style="width: 125px; height: 125px;" align="center "class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$user->userable->shop_name}}
                        </div>
                        <div class="profile-usertitle-job">
                            {{$user->userable->description}} / {{$user->userable->city}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a href="https://www.instagram.com/{{$user->userable->shop_name}}">
                        <button type="button" class="btn btn-circle green-haze btn-sm">Instagram'a git</button>
                        </a>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="extra_profile.html">
                                    <i class="icon-home"></i>
                                    Overview </a>
                            </li>
                            <li>
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
                <!-- PORTLET MAIN -->
                <div class="portlet light">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                37
                            </div>
                            <div class="uppercase profile-stat-text">
                                Projects
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                51
                            </div>
                            <div class="uppercase profile-stat-text">
                                Tasks
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                61
                            </div>
                            <div class="uppercase profile-stat-text">
                                Uploads
                            </div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Begin: life time stats -->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">GENEL BAKIŞ</span>
                                    <span class="caption-helper">weekly stats...</span>
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                                    </a>
                                    <a href="javascript:;" class="reload" data-original-title="" title="">
                                    </a>
                                    <a href="javascript:;" class="fullscreen" data-original-title="" title="">
                                    </a>
                                    <a href="javascript:;" class="remove" data-original-title="" title="">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#overview_1" data-toggle="tab" aria-expanded="true">
                                                Top Selling </a>
                                        </li>
                                        <li>
                                            <a href="#overview_2" data-toggle="tab">
                                                Most Viewed </a>
                                        </li>
                                        <li class="">
                                            <a href="#overview_3" data-toggle="tab" aria-expanded="false">
                                                Customers </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                                Orders <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#overview_4" tabindex="-1" data-toggle="tab">
                                                        Latest 10 Orders </a>
                                                </li>
                                                <li>
                                                    <a href="#overview_4" tabindex="-1" data-toggle="tab">
                                                        Pending Orders </a>
                                                </li>
                                                <li>
                                                    <a href="#overview_4" tabindex="-1" data-toggle="tab">
                                                        Completed Orders </a>
                                                </li>
                                                <li>
                                                    <a href="#overview_4" tabindex="-1" data-toggle="tab">
                                                        Rejected Orders </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="overview_1">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Product Name
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th>
                                                            Sold
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach ($products as $product)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                {{$product->title}} </a>
                                                        </td>
                                                        <td>
                                                            {{$product->price}}  {{$product->current_unit}}
                                                        </td>
                                                        <td>
                                                            809
                                                        </td>
                                                        <td>
                                                            <a href="{{ action('Dashboard\ProductController@edit',$product->id)  }}" class="btn default btn-xs green-stripe">
                                                                Düzenle </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="overview_2">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Product Name
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th>
                                                            Views
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Metronic - Responsive Admin + Frontend Theme </a>
                                                        </td>
                                                        <td>
                                                            $20.00
                                                        </td>
                                                        <td>
                                                            11190
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Regatta Luca 3 in 1 Jacket </a>
                                                        </td>
                                                        <td>
                                                            $25.50
                                                        </td>
                                                        <td>
                                                            1245
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Apple iPhone 4s - 16GB - Black </a>
                                                        </td>
                                                        <td>
                                                            $625.50
                                                        </td>
                                                        <td>
                                                            809
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Samsung Galaxy S III SGH-I747 - 16GB </a>
                                                        </td>
                                                        <td>
                                                            $915.50
                                                        </td>
                                                        <td>
                                                            6709
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Motorola Droid 4 XT894 - 16GB - Black </a>
                                                        </td>
                                                        <td>
                                                            $878.50
                                                        </td>
                                                        <td>
                                                            784
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Samsung Galaxy Note 3 </a>
                                                        </td>
                                                        <td>
                                                            $925.50
                                                        </td>
                                                        <td>
                                                            21245
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Inoval Digital Pen </a>
                                                        </td>
                                                        <td>
                                                            $125.50
                                                        </td>
                                                        <td>
                                                            1245
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="overview_3">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Customer Name
                                                        </th>
                                                        <th>
                                                            Total Orders
                                                        </th>
                                                        <th>
                                                            Total Amount
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                David Wilson </a>
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            $625.50
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Amanda Nilson </a>
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>
                                                            $12625.50
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Jhon Doe </a>
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            $125.00
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Bill Chang </a>
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                        <td>
                                                            $12,125.70
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Paul Strong </a>
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            $890.85
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Jane Hilson </a>
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>
                                                            $239.85
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Patrick Walker </a>
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            $1239.85
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="overview_4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Customer Name
                                                        </th>
                                                        <th>
                                                            Date
                                                        </th>
                                                        <th>
                                                            Amount
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                David Wilson </a>
                                                        </td>
                                                        <td>
                                                            3 Jan, 2013
                                                        </td>
                                                        <td>
                                                            $625.50
                                                        </td>
                                                        <td>
														<span class="label label-sm label-warning">
														Pending </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Amanda Nilson </a>
                                                        </td>
                                                        <td>
                                                            13 Feb, 2013
                                                        </td>
                                                        <td>
                                                            $12625.50
                                                        </td>
                                                        <td>
														<span class="label label-sm label-warning">
														Pending </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Jhon Doe </a>
                                                        </td>
                                                        <td>
                                                            20 Mar, 2013
                                                        </td>
                                                        <td>
                                                            $125.00
                                                        </td>
                                                        <td>
														<span class="label label-sm label-success">
														Success </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Bill Chang </a>
                                                        </td>
                                                        <td>
                                                            29 May, 2013
                                                        </td>
                                                        <td>
                                                            $12,125.70
                                                        </td>
                                                        <td>
														<span class="label label-sm label-info">
														In Process </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Paul Strong </a>
                                                        </td>
                                                        <td>
                                                            1 Jun, 2013
                                                        </td>
                                                        <td>
                                                            $890.85
                                                        </td>
                                                        <td>
														<span class="label label-sm label-success">
														Success </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Jane Hilson </a>
                                                        </td>
                                                        <td>
                                                            5 Aug, 2013
                                                        </td>
                                                        <td>
                                                            $239.85
                                                        </td>
                                                        <td>
														<span class="label label-sm label-danger">
														Canceled </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;">
                                                                Patrick Walker </a>
                                                        </td>
                                                        <td>
                                                            6 Aug, 2013
                                                        </td>
                                                        <td>
                                                            $1239.85
                                                        </td>
                                                        <td>
														<span class="label label-sm label-success">
														Success </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn default btn-xs green-stripe">
                                                                View </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: life time stats -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET -->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold">Müşteri Yorumları</span>
                                    <span class="caption-helper">45 pending</span>
                                </div>
                                <div class="inputs">
                                    <div class="portlet-input input-inline input-small ">
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control form-control-solid" placeholder="search...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 305px;"><div class="scroller" style="height: 305px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">
                                        <div class="general-item-list">
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar4.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">3 hrs ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar3.jpg">
                                                        <a href="" class="item-name primary-link">Mark</a>
                                                        <span class="item-label">5 hrs ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar6.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">8 hrs ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-primary"></span> Closed</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar7.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">12 hrs ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-danger"></span> Pending</span>
                                                </div>
                                                <div class="item-body">
                                                    Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar9.jpg">
                                                        <a href="" class="item-name primary-link">Richard Stone</a>
                                                        <span class="item-label">2 days ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-danger"></span> Open</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar8.jpg">
                                                        <a href="" class="item-name primary-link">Dan</a>
                                                        <span class="item-label">3 days ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="{{asset('/dashboard')}}/assets/admin/layout3/img/avatar2.jpg">
                                                        <a href="" class="item-name primary-link">Larry</a>
                                                        <span class="item-label">4 hrs ago</span>
                                                    </div>
                                                    <span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
                                                </div>
                                                <div class="item-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 115.703px; background: rgb(215, 220, 226);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                            </div>
                        </div>
                        <!-- END PORTLET -->
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>



    @endsection


