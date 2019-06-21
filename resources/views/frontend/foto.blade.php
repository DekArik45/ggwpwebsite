@extends('frontend.layouts.app')
@section('css')
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="{{asset('user_asset/assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/plugins/animate/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/plugins/cubeportfolio/css/cubeportfolio.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/plugins/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/plugins/fancybox/jquery.fancybox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/plugins/slider-for-bootstrap/css/slider.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user_asset/assets/demos/default/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/themes/default.css')}}" rel="stylesheet" id="style_theme" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('class_body','c-layout-header-fixed c-layout-header-mobile-fixed')
@section('title','Galery Foto TBTN')
@section('foto', 'current-menu-item')
@section('galery', 'current-menu-item')
@section('content')
    
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-5" style="background-position: 50% 7px;"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Gallery Foto</h3>
            <span class="before" style="border-width: 47px 24px;"></span>
            <span class="after" style="border-width: 47px 24px;"></span>
        </div>
    </section>

    <div class="c-layout-page" style="margin-left:10px; margin-bottom:80px;">

            <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md c-bg-white c-overflow-hide">

            <div id="grid-container" class="cbp">
                @foreach ($foto as $item)        
                    <div class="cbp-item identity logos">
                        <a style="border-radius:10px;margin-right:10px;margin-bottom:10px;" href="{{$item->path}}" class="cbp-caption cbp-lightbox" data-title="TBTN<br>by Panitia TBTN 2019">
                            <div class="cbp-caption-defaultWrap">
                                <img style="border-radius:10px;height:225px;"  src="{{$item->path}}" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap" style="border-radius:10px;">
                                <div class="cbp-l-caption-alignLeft">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">{{$item->tahun}}</div>
                                        <div class="cbp-l-caption-desc">by Panitia TBTN 2019</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>  
            <!-- END: PAGE CONTENT -->
    </div>
@endsection
 
@section('script')
<script src="{{asset('user_asset/assets/plugins/jquery-migrate.min.js')}}" type="text/javascript" ></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/scripts.js')}}"></script>
<!-- END: CORE PLUGINS -->

        <!-- BEGIN: LAYOUT PLUGINS -->
        <script src="{{asset('user_asset/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('user_asset/assets/plugins/fancybox/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
        <script src="{{asset('user_asset/assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js')}}" type="text/javascript"></script>
            <!-- END: LAYOUT PLUGINS -->

<!-- BEGIN: THEME SCRIPTS -->
<script src="{{asset('user_asset/assets/base/js/components.js')}}" type="text/javascript"></script>
<script src="{{asset('user_asset/assets/base/js/components-shop.js')}}" type="text/javascript"></script>
<script src="{{asset('user_asset/assets/base/js/app.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {    
    App.init(); // init core    
});
</script>
<!-- END: THEME SCRIPTS -->
    <!-- BEGIN: PAGE SCRIPTS -->
        <script src="{{asset('user_asset/assets/demos/default/js/scripts/pages/fullwidth-gallery.js')}}" type="text/javascript"></script>
    <!-- END: PAGE SCRIPTS -->
@endsection

@section('script2')
    
@endsection