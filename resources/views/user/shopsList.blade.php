@extends('user.main')

@section('title','Magazalar')
@endsection


@section('content')

    <section id="content">

        <div class="content-wrap">


            <div class="container clearfix">
                @foreach($paginator->items() as $supplier)
                        <!-- Portfolio Single Image
                ============================================= -->
                <div class="col_one_third portfolio-single-image nobottommargin">
                    <a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}">
                        <img src="{{ $supplier->profile_image }}" alt=""></a>
                </div>
                <!-- .portfolio-single-image end -->

                <!-- Portfolio Single Content
                ============================================= -->
                <div class="col_two_third portfolio-single-content col_last nobottommargin">
                    <!-- Portfolio Single - Description
                    ============================================= -->
                    <div class="fancy-title title-bottom-border">
                        <h2>
                            <a href="{{ action('Frontend\HomeController@shopDetail',$supplier->id) }}">{{ $supplier->shop_name }}
                                :</a></h2>
                    </div>
                    {!! $supplier->description  !!}
                            <!-- Portfolio Single - Description End -->

                </div>
                <!-- .portfolio-single-content end -->

                <div class="clear">
                </div>

                <div class="divider divider-center">
                    <i class="icon-circle"></i>
                </div>

                @endforeach

                <div class="row">
                    <ul class="pagination topmargin nobottommargin pull-right">
                        <li @if(1==$paginator->currentPage()) class="disabled" @endif><a
                                    href="{{ $paginator->url(1) }}">«</a></li>
                        @for ($i = 1 ; $i <=$paginator->lastPage(); $i++)
                            <li @if($i==$paginator->currentPage()) class="active" @endif ><a
                                        href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        <li @if($paginator->lastPage()==$paginator->currentPage()) class="disabled" @endif><a
                                    href="{{ $paginator->url($paginator->lastPage()) }}">»</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section><!-- #content end -->


@endsection