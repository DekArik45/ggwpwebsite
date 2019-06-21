@extends('frontend.layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/owl.carousel.css')}}">
@endsection
@section('class_body','blog')
@section('title','Pengumuman TBTN')
@section('pengumuman', 'current-menu-item')

@section('content')
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-5"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Pengumuman TBTN</h3>
        </div>
    </section>

    <!-- SECTION BLOG -->
    <section class="section-blog section">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <!-- BLOG LIST -->
                <div class="col-md-10">
                    <div class="blog-list">
                        @if (!$pengumuman->isEmpty())
                            @foreach ($pengumuman as $item)
                                <!-- POST -->
                                <div class="post post-single">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <div class="image-wrap" style="width:100%;">
                                                    <img style="height:100%; border-radius:13px;" src="{{$item->image}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="post-body" style="margin-left:6%;">
                                                <div class="post-title">
                                                    <h3 class="xmd title-list-berita" style="margin:0;" ><a href="/detail_pengumuman/{{$item->id}}">{{$item->judul}}</a></h3>
                                                </div>
                                                <div class="post-content content-list-berita">
                                                    {!!$item->content!!}
                                                </div>
                                                <div class="post-footer">
                                                    <a href="/detail_pengumuman/{{$item->id}}" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Read</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- END / POST -->
                            @endforeach
                        @else
                            <div class="post post-single">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <div class="image-wrap" style="width:100%;">
                                                <img style="height:100%; border-radius:13px;" src="{{asset('images/logo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="post-body" style="margin-left:6%;">
                                            <div class="post-title">
                                                <h3 class="xmd title-list-berita" style="margin:0;" ><a href="javascript:void(0);">Belum Ada Pengumuman Untuk Saat Ini</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    </div>

                    {{-- <div class="pagination">
                        <span class="pagination-prev"><i class="fa fa-angle-left"></i></span>
                        <span class="current">1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#" class="pagination-next"><i class="fa fa-angle-right"></i></a>
                    </div> --}}
                </div>
                <!-- END / BLOG LIST -->

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