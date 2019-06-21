@extends('frontend.layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/owl.carousel.css')}}">
@endsection
@section('class_body','single-post')
@section('title','Pengumuman TBTN')
@section('pengumuman', 'current-menu-item')

@section('content')

    <!-- SECTION BLOG -->
    <section class="section-blog section">
        <div class="container">
            <div class="row">
                <!-- BLOG LIST -->
                <div class="col-md-8">
                    <div class="blog-single">

                        <!-- POST -->
                        <div class="post post-single">
                            <div class="post-media">
                                <div class="image-wrap">
                                    <img style="border-radius:13px;" src="{{$pengumuman->image}}" alt="">
                                </div>
                            </div>
                            <div class="post-body">
                                <div class="post-title">
                                    <h3 class="xmd">{{$pengumuman->judul}}</h3>
                                </div>
                                <div class="meta-info">
                                    <span><i class="icon awe_clock_2"></i>{{$pengumuman->created_at}}</span>
                                    <span><i class="icon awe_user"></i>By <a href="#">Admin TBTN 2019</a></span>
                                </div>
                                <div class="post-content">
                                    {!!$pengumuman->content!!}
                                                                        
                                </div>
                            </div>

                        </div>
                        <!-- END / POST -->
                        
                    </div>

                </div>
                <!-- END / BLOG LIST -->

                <!-- SIDEBAR -->
                <div class="col-md-4" style="margin-top:80px;">
                    @foreach ($pengumuman_sidebar as $item)
                        <article class="berita-sidebar">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="background-image-holder" style="border-radius: 6px; background: url({{$item->image}}); opacity: 1;">
                                        <img style="height: 70px; border-radius:7px;" alt="background" src="{{$item->image}}" >
                                    </div>
                                </div>
                
                                <div class="col-md-8 col-8">
                                    <a class="a-black" href="https://www.unhi.ac.id/id/berita/detail-berita/Prodi-Pendidikan-Seni-Rupa-Ornamen-Hindu-Unhi-Denpasar-Gelar-Pameran%C2%A0">
                                        <h5 class="pengumuman-title line-clamp-secondary">{{$item->judul}}&nbsp;</h5>
                                    </a>
                                    <p>
                                        {{$item->created_at}}
                                    </p>
                                </div>
                            </div>                        
                        </article>
                    @endforeach 
                </div>
                <!-- END / SIDEBAR -->

            </div>

        </div>

    </section>
    <!-- END / SECTION BLOG -->
@endsection
 
@section('script')
<script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
@endsection

@section('script2')
    
@endsection