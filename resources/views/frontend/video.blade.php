@extends('frontend.layouts.app')
@section('css')
    <!-- CSS LIBRARY -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/magnific-popup.css')}}">
    
	<link href="{{asset('user_asset/assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('user_asset/assets/plugins/animate/animate.min.css')}}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->

			<!-- BEGIN: BASE PLUGINS  -->
			<link href="{{asset('user_asset/assets/plugins/cubeportfolio/css/cubeportfolio.min.css')}}" rel="stylesheet" type="text/css"/>
			<link href="{{asset('user_asset/assets/plugins/fancybox/jquery.fancybox.css')}}" rel="stylesheet" type="text/css"/>
			<link href="{{asset('user_asset/assets/plugins/slider-for-bootstrap/css/slider.css')}}" rel="stylesheet" type="text/css"/>
				<!-- END: BASE PLUGINS -->
	
	
    <!-- BEGIN THEME STYLES -->
	<link href="{{asset('user_asset/assets/demos/default/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/themes/default.css')}}" rel="stylesheet" id="style_theme" type="text/css"/>
	<link href="{{asset('user_asset/assets/demos/default/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('class_body','')
@section('title','Video TBTN')
@section('galery','current-menu-item')
@section('video', 'current-menu-item')

@section('content')
    <!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Video TBTN</h3>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- EVENTS -->
    @if ($detail_video != "")
        <section id="events" class="events section">
            <div class="section-content" style="padding-bottom:0;padding-top:0;">
                <div class="container">
                    <div class="item-event">
                        <div class="row">
                            <div class="col-sm-1"></div>                            
                            <div class="col-sm-9">
                                <div class="content-heading mt">
                                </div>
            
                                {{-- @foreach ($detail_video as $item) --}}
                                    
                                    <iframe style="width: 100%;height: 400px;" class="vid" id="yt" src="https://www.youtube.com/embed/{{$detail_video->path}}" allowfullscreen="allowfullscreen"></iframe>
                                    
                                    
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    <!-- END / EVENTS -->

    <!-- Book -->

    <section id="section-blog" class="section-blog section" style="margin-top:10px; border-bottom: 0.7px solid #b5b5b5b5;">

        <div class="container">

            <div class="content-heading mt">
                <h4 class="lg text-uppercase">
                    <span style="border-bottom: 3px solid #d39f00;
                    padding-bottom: 8px;">Another Video</span>
                </h4>
                
            </div>

            <div class="row">

                <div class="blog-grid">

                    <div class="grid-sizer" style="width:25%;"></div>

                    <!-- BLOG POST -->
                    @foreach ($video as $item)
                        <div class="post post-single " style="width:25%;"> 
                            <a href="/detail_video/{{$item->id}}">
                                <div class="post-media">
                                    <img src="{{$item->thumbnail}}" alt="">                                
                                </div>
                                <p class="book-body">
                                    {{$item->title}}
                                </p>   
                            </a>
                        </div>
                    @endforeach
                    <!-- END / BLOG POST -->

                </div>

            </div>

        </div>

    </section>

    <!-- End Book -->
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
