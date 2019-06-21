@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/theme.css')}}">
@endsection
@section('title','TBTN 2019')
@section('class_body','home')
@section('home', 'current-menu-item')

@section('content')
    <section id="home-media" class="home-media section">

        <div class="home-fullscreen tb">

            <ul class="home-slider" data-background="awe-static">
                <li>
                    <div class="image-wrap">
                        <img src="{{asset('images/background_nature3.jpg')}}" alt="">
                    </div>
                    <div class="slider-content text-center" style="top: 42%;
                    left: 50%;">
                        <div class="home-content">
                            <div class="image-tbtn-logo">
                                <img src="{{asset('/images/logo-white.png')}}" style="width: 120px;" alt=""> 
                                <h3 class="sbig" style="
                                    font-size: 33px;
                                    /* float: right; */
                                    /* display: inline-block; */
                                    /* padding-left: 0; */
                                    margin-top: 0px;
                                    /* padding-top: 11px; */
                                    font-weight: bold;
                                ">Teknik Back To Nature</h3>
                            </div>
                            <p style="
                                    text-align: center;
                                    /* width: 500px; */
                                    margin: 0px;
                                    /* float: left; */
                                    /* font-size: 18px; */
                                    display: inline-block;
                            ">Kegiatan yang bertujuan untuk melakukan relaksasi setelah menjalani kehidupan kampus yang berat dengan kembali ke alam, serta untuk melakukan pengabdian ke masyarakat dan menjaga alam bali yang kita cintai</p>
                            <div class="awe-hr">
                                <i class="icon awe_certificate"></i>
                            </div>
                            <a href="/daftar" style="font-size:16px;" class="awe-btn awe-btn-6 awe-btn-plus text-uppercase mybtn">Daftar TBTN</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="image-wrap">
                        <img src="{{asset('images/background_nature2.jpg')}}" alt="">
                    </div>
                    <div class="slider-content text-center" style="top: 42%;
                    left: 50%;">
                        <div class="home-content">
                            <div class="image-tbtn-logo">
                                <img src="{{asset('/images/logo-white.png')}}" style="width: 120px;" alt=""> 
                                <h3 class="sbig" style="
                                    font-size: 33px;
                                    /* float: right; */
                                    /* display: inline-block; */
                                    /* padding-left: 0; */
                                    margin-top: 0px;
                                    /* padding-top: 11px; */
                                    font-weight: bold;
                                ">Teknik Back To Nature</h3>
                            </div>
                            <p style="
                                    text-align: center;
                                    /* width: 500px; */
                                    margin: 0px;
                                    /* float: left; */
                                    /* font-size: 18px; */
                                    display: inline-block;
                            ">Kegiatan yang bertujuan untuk melakukan relaksasi setelah menjalani kehidupan kampus yang berat dengan kembali ke alam, serta untuk melakukan pengabdian ke masyarakat dan menjaga alam bali yang kita cintai</p>
                            <div class="awe-hr">
                                <i class="icon awe_certificate"></i>
                            </div>
                            <a href="/daftar" style=" font-size:16px;" class="awe-btn awe-btn-6 awe-btn-plus text-uppercase mybtn">Daftar TBTN</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="image-wrap">
                        <img src="{{asset('images/background_nature.jpg')}}" alt="">
                    </div>
                    <div class="slider-content text-center" style="top: 42%;
                    left: 50%;">
                        <div class="home-content">
                            <div class="image-tbtn-logo">
                                <img src="{{asset('/images/logo-white.png')}}" style="width: 120px;" alt=""> 
                                <h3 class="sbig" style="
                                    font-size: 33px;
                                    /* float: right; */
                                    /* display: inline-block; */
                                    /* padding-left: 0; */
                                    margin-top: 0px;
                                    /* padding-top: 11px; */
                                    font-weight: bold;
                                ">Teknik Back To Nature</h3>
                            </div>
                            <p style="
                                    text-align: center;
                                    /* width: 500px; */
                                    margin: 0px;
                                    /* float: left; */
                                    /* font-size: 18px; */
                                    display: inline-block;
                            ">Kegiatan yang bertujuan untuk melakukan relaksasi setelah menjalani kehidupan kampus yang berat dengan kembali ke alam, serta untuk melakukan pengabdian ke masyarakat dan menjaga alam bali yang kita cintai</p>
                            <div class="awe-hr">
                                <i class="icon awe_certificate"></i>
                            </div>
                            <a href="/daftar" style="font-size:16px;" class="awe-btn awe-btn-6 awe-btn-plus text-uppercase mybtn">Daftar TBTN</a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>

    </section>

    <!-- END / HOME MEDIA -->

    <!-- GOOD FOOD -->
    <section id="good-food" class="good-food section pd">
        <div class="container">
            <div class="good-food-heading text-center">
                <div class="good-food-title style-2">
                    <i class="icon awe_quote_left"></i>
                    <h2 class="lg text-capitalize">Teknik Back To Nature</h2>
                    <i class="icon awe_quote_right"></i>
                </div>
                <p>Kegiatan yang bertujuan untuk melakukan relaksasi setelah menjalani kehidupan kampus yang berat dengan kembali ke alam, serta untuk melakukan pengabdian ke masyarakat dan menjaga alam bali yang kita cintai</p>
                <a href="about.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Tentang TBTN</a>
            </div>
        </div>

        <div class="divider divider-2"></div>
    </section>
    <!-- END / GOOD FOOD -->

    <!-- SECTION HIGHLIGHT -->

    <section class="section-highlight section">

        <div class="divider divider-2 divider-color"></div>

        <div class="awe-color"></div>

        <div class="container">

            <div class="highlight-content tb">

                <div class="tb-cell">

                    <p>Siap untuk mengikuti keseruan Teknik Back To Nature tahun ini? Ayo Daftar Sekarang!</p>

                </div>

                <div class="links tb-cell">

                    <div class="reservation-link">

                        <a href="/daftar" class="awe-btn awe-btn-2 awe-btn-plus text-uppercase">Daftar TBTN</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- END / SECTION HIGHLIGHT -->

    <!-- GOOD FOOD -->

    @if (!$pengumuman->isEmpty())
    <section id="fastfood" class="fastfood section pd50" style="padding-bottom:35px;">
            <div class="divider divider-2"></div>

        <div class="container">

            <div class="row">
                <div class="content-heading mt" style="margin-left:15px;">
                    <h4 class="lg text-uppercase" style="margin-bottom: 50px;">
                        <span style="border-bottom: 3px solid #d39f00;
                        padding-bottom: 8px;">Pengumuman</span>
                    </h4>    
                </div>

                <div class="col-md-8 col-18">
                    
                    <div class="home-fixheight tb">

                        <ul class="home-slider" style="height:415px;" data-background="awe-static">
                            @foreach ($pengumuman as $item)

                                <a href="/pengumuman/{{$item->id}}">                                    
                                    <li>
                                        <div class="image-wrap" style="">
                                            <img src="{{$item->image}}" alt="">
                                        </div>
                                        <div class="slider-content text-left" style="left:5px;">
                                            <div class="home-content">
                                                <div class="headline-mark">
                                                    Headline
                                                </div>
                                                <div class="content-berita-slider">
                                                    <h4 class="title-berita-slider">{{$item->judul}}</h4>
                                                    <p class="isi-berita-slider">
                                                            {{$item->content}}
                                                    </p>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>

                            @endforeach
                        </ul>
            
                    </div>

                </div>

                <div class="col-md-4">
                    @foreach ($pengumuman as $item)
                        <article class="berita-sidebar">
                            <a class="a-black" href="/pengumuman/{{$item->id}}">
                                <div class="row">
                                    <div class="col-md-4 col-4" style="padding:0;">
                                        <img style="width: 100%;
                                        height: 90px;
                                        border-radius: 7px;" alt="background" src="{{$item->image}}" >
                                    </div>
                    
                                    <div class="col-md-8 col-8">
                                        <h5 class="pengumuman-title line-clamp-secondary">{{$item->judul}}&nbsp;</h5>
                                        <p>
                                            {{$item->created_at}}
                                        </p>
                                    </div>
                                </div>    
                            </a>                    
                        </article>
                    @endforeach 
                </div>

            </div>

        </div>

    </section>
    @endif

    <!-- END / GOOD FOOD -->

    <!-- TESTIMONIAL -->

    {{-- <section id="testimonial" class="testimonial testimonial-1 section">
        <!-- BACKGROUND -->

        <div class="awe-parallax bg-2"></div>
        <div class="awe-overlay"></div>

        <div class="container">

            <div class="testimonial-content">

                <div class="icon-head">

                    <i class="icon awe_quote_left"></i>

                </div>
                
                <blockquote>

                    <span>A leader is one who knows</span>

                    <span>the way, goes the way, and shows the way</span>

                    <div class="test-footer text-right">

                        <span class="sm">John C. Maxwell</span>

                    </div>

                </blockquote>

            </div>

        </div>

    </section> --}}

    <!-- END / TESTIMONIAL -->

    <!-- Book -->

    {{-- <section id="section-blog" class="section-blog section" style="    border-bottom: 0.7px solid #b5b5b5b5;">

        <div class="container">

            <div class="content-heading mt">
                <h4 class="lg text-uppercase">
                    <span style="border-bottom: 3px solid #d39f00;
                    padding-bottom: 8px;">Referensi buku ILS</span>
                </h4>
                
            </div>

            <div class="row">

                <div class="blog-grid">

                    <div class="grid-sizer"></div>

                    <!-- BLOG POST -->
                    @foreach ($buku as $item)
                        <div class="post post-single "> 
                            <a href="/detail_buku/{{$item->id}}">
                                <div class="post-media">
                                    <img src="{{$item->image}}" alt="">                                
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

            <div class="loadmore text-center">

                <a href="/list_buku" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">LOAD MORE BOOKS</a>

            </div>



        </div>

    </section> --}}

    <!-- End Book -->

    <!-- Video and Photo -->

    <section id="fastfood" class="fastfood section pd50" style="padding-bottom:35px;">
        <div class="divider divider-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="content-heading mt">
                        <h4 class="lg text-uppercase" style="margin-bottom: 50px;">
                            <span style="border-bottom: 3px solid #d39f00;
                            padding-bottom: 8px;">Galery Photo</span>
                        </h4>    
                    </div>

                    <div class="galery-img">
                        <div class="galery-top">
                            @foreach ($foto_top as $item)
                                <img class="inside-img" src="{{$item->path}}" alt="">
                            @endforeach
                        </div>
                        <div class="galery-bottom">
                            @foreach ($foto_bottom as $item)
                                <img class="inside-img" src="{{$item->path}}" alt="">    
                            @endforeach
                        </div>                       
                    </div>

                    <div class="awe-btn awe-btn-2 awe-btn-ar text-uppercase">
                        <a href="/foto">MORE PHOTOS</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-heading mt">
                        <h4 class="lg text-uppercase" style="margin-bottom: 50px;">
                            <span style="border-bottom: 3px solid #d39f00;
                            padding-bottom: 8px;">Video</span>
                        </h4>    
                    </div>

                    {{-- @foreach ($video as $item) --}}
                        <div class="boxed boxed--lg box-video-home">
                            <div class="video-cover">
                                <iframe class="vid" id="yt" src="https://www.youtube.com/embed/{{$video->path}}" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <h5><a href="/detail_video/{{$video->id}}">Teaser Video TBTN 2019</a></h5>
                        </div>
                    {{-- @endforeach --}}

                    <!--end video cover-->
                    <div class="awe-btn awe-btn-2 awe-btn-ar text-uppercase">
                        <a href="/video">MORE VIDEOS</a>
                    </div>                 
                </div>
            </div>
        </div>
        
    </section>

    <!-- end video and photo -->

    <!-- CONTACT US -->

    <section id="contact" class="contact section">
        <div class="contact-first">
            <!-- OVERLAY -->

            <div class="awe-overlay overlay-default"></div>

            <!-- END / OVERLAY -->
            <div class="section-content">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="contact-body text-center">

                                <h3 class="lg text-uppercase">LOKASI TBTN</h3>

                                <hr class="_hr">

                                <address class="address-wrap">

                                    <span class="address">Bali, Indonesia</span>

                                    <span class="phone">TEKNIK BACK TO NATURE, SMFT</span>

                                </address>

                            </div>
                            <div class="see-map text-center">

                                <a href="#" data-see-contact="See contact info" data-see-map="See location on map" class="awe-btn awe-btn-5 awe-btn-default text-uppercase"></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- MAP -->

            {{-- <div id="map" data-map-zoom="14" data-map-latlng="-8.244944, 115.153559" data-snazzy-map-theme="grayscale" data-map-marker-size="200*60"></div> --}}

            <!-- END / MAP -->

        </div>
    </section>

    <!-- END / CONTACT US -->
@endsection
 
@section('script')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user_asset/js/lib/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
@endsection

@section('script2')
    <script>
        $(function() {
            $( ".image-tbtn-logo .item-img" ).remove( );
        });
    </script>
@endsection