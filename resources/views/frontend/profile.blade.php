@extends('frontend.layouts.app')
@section('css')
    
@endsection
@section('class_body','')
@section('title','Profile Peserta')
@section('profile', 'current-menu-item')

@section('content')

    <!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Your Profile</h3>
        </div>
    </section>
    <!-- SHOP PAGE -->
    <section id="shop-page" class="shop-page section">
        <div class="container">
            <div class="row">
                <div class="checkout">
                    <!-- YOUR ORDER -->
                    <div class="col-md-3">
                        <div class="your-order">
                            <h4 class="xmd text-capitalize">{{Auth::guard('user')->user()->name}}</h4> 
                            <ul class="list-price">
                                <li class="total">
                                    <a href="/profile">Your Data Profile</a>
                                </li>
                                <li class="total">
                                    <a href="/list-peserta">Data Peserta</a>
                                </li>
                            </ul>
                            
                            <a href="/logout">
                                <div class="payment">
                                    Logout
                                </div>
                            </a>
                            
                        </div>
                    </div>
                    <!-- END / YOUR ORDER -->
                    <!-- CHECKOUT CONTENT -->
                    <div class="col-md-9">
                        <div class="checkout-content">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="xmd text-capitalize">Proof Of Payment</h4>

                                    
                                </div>

                                <div class="col-md-6">
                                    <h4 class="xmd text-capitalize">Download Twibon</h4>
                                </div>
                            </div>

                            <h4 class="xmd text-capitalize">Info Peserta</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_first_name">
                                        NIM <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required name="nim" id="billing_first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_company">
                                        Nama <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required name="nama" id="billing_company">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Prodi <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" autocomplete="off" list="prodi" name="prodi_id" required id="billing_courier">
                                    <datalist id="prodi">
                                        {{-- <option value="{{$prodi->id}}">{{$prodi->nama_prodi}}</option> --}}
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Phone <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required name="no_telp" id="billing_phone">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Agama <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" autocomplete="off" list="agama" name="agama_id" required id="billing_courier">
                                    <datalist id="agama">
                                        {{-- <option value="{{$item->id}}">{{$item->nama_agama}}</option> --}}
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Penyakit Bawaan 
                                    </label>
                                    <input type="text" name="penyakit_bawaan" id="billing_phone">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Jenis Kelamin <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" autocomplete="off" list="kelamin" name="jenis_kelamin" required id="billing_courier">
                                    <datalist id="kelamin">
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Vegetarian
                                    </label>
                                    <input type="text" autocomplete="off" list="veget" name="vegetarian" required id="billing_courier">
                                    <datalist id="veget">
                                        <option value="1">Vegetarian</option>
                                        <option value="2">Tidak Vegetarian</option>
                                    </datalist>
                                </div>
                            </div>

                            <h4 class="xmd text-capitalize">Info Orang Tua</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        Nama Orang Tua <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required name="nama_ortu" id="billing_address_1">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_address_1" class="">
                                        No Telp Orang Tua <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required name="no_telp_ortu" id="billing_address_1">
                                </div>
                            </div>

                            <input type="submit" value="confirm &amp; checkout" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">
                        </div>
                    </div>
                    <!-- END / CHECKOUT CONTENT -->
                </div>
            </div>
        </div>
    </section>
    <!-- END / SHOP PAGE -->
        
@endsection
 
@section('script')
<script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/retina.min.js')}}"></script>
@endsection

@section('script2')
@if (Session::has('Success'))
<script>
    jQuery(document).ready(function ($) {
        $(function(){
            swal("Success", "{{Session::get('Success')}}", "success");
        });
    });
</script>
@endif

@if (Session::has('Success Upload'))
<script>
    jQuery(document).ready(function ($) {
        $(function(){
            swal("Success", "{{Session::get('Success Upload')}}", "success");
        });
    });
</script>
@endif

@if (Session::has('Error Upload'))
<script>
    jQuery(document).ready(function ($) {
        $(function(){
            swal("Error", "{{Session::get('Error Upload')}}", "error");
        });
    });
</script>
@endif
@endsection