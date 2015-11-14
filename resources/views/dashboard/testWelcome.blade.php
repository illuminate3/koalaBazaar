@extends ('dashboard.mainBaser')
@extends ('dashboard.pageBaser')
@section('title')
    Welcome Page
@stop

@section('body')
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

@section('page_level_portlets')
    Hello Welcome tester ...  There will be portlets here..
@stop



