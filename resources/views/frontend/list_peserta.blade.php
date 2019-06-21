@extends('frontend.layouts.app')
@section('css')
    <style>
        .mybtntable{
            padding: 5px 9px;
            margin: 3px;
            position: relative;
            display: inline-block;
            cursor: pointer;
            letter-spacing: 1px;
            border-radius: 8px;
        }
        .expired{
            border: 2px solid #ff3636ad;
            color: #ef0000;
        }
        .terverifikasi{
            border: 2px solid #12a700ad;
            color: #00980f;
        }
        .masih-dalam-proses{
            border: 2px solid #0082cead;
            color: #009dbb;
        }
        .tolak{
            border: 2px solid #ff3636ad;
            color: #ef0000;
        }
        .belum-upload{
            border: 2px solid #ffc000c9;
            color: #936e00;
        }
    </style>
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
                                    <h4 class="xmd text-capitalize">Transfer ke : </h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="billing_first_name">
                                                Jenis Rekening :
                                            </label>
                                            <input type="text" readonly value="Rekening BCA" id="billing_first_name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="billing_company">
                                                Atas Nama :
                                            </label>
                                            <input type="text" required value="I G A Ayu Cantika Indraswari" readonly id="billing_company">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="billing_email">
                                                No Rekening :
                                            </label>
                                            <input type="text" required value="7725308990" readonly id="billing_company">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="text-align:center;">
                                    <a href="{{asset('images/twibon.png')}}" download><h4 class="xmd text-capitalize">Download Twibon</h4></a>
                                    <a href="{{asset('images/twibon.png')}}" download><img style="width:70%;" src="{{asset('images/twibon.png')}}" alt=""></a><br/>
                                    Pastikan untuk mengupload twibon kamu ke IG, jangan lupa Tag Akun TBTN : #SMFT-TBTN2019
                                </div>
                            </div>

                            <h4 class="xmd text-capitalize">Data Peserta</h4>
                            <div class="form-row">
                                    <table id="profile" style="font-size:14px;" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Paket</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Total</th>
                                                <th style="width:150px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($list_peserta as $data)
                                            <tr>
                                                <td>{{$data->paket}}</td>
                                                <td>{{$data->nim}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{Carbon\Carbon::parse($data->time_out)->format('d-m-Y')}}</td>
                                                <td>Rp. {{number_format($data->total,0,',','.')}}</td>
                                                @if ($data->status == '4')
                                                    <td >
                                                        <a href="/detail-peserta/{{$data->id}}" class="mybtntable expired">Transaksi telah Expired</a>
                                                    </td>
                                                @elseif ($data->status == '3')
                                                    <td >
                                                        <a href="/detail-peserta/{{$data->id}}" class="mybtntable tolak">Telah DiTolak</a>
                                                    </td>
                                                @elseif ($data->status == '2')
                                                    <td >
                                                        <a href="/detail-peserta/{{$data->id}}" class="mybtntable terverifikasi">Telah Terverifikasi</a>
                                                    </td>
                                                @elseif ($data->status == '1')
                                                    <td >
                                                        <a href="/detail-peserta/{{$data->id}}" class="mybtntable masih-dalam-proses">Dalam Proses Verifikasi</a>
                                                    </td>
                                                @elseif ($data->status == '0')
                                                    <td >
                                                        <a href="/detail-peserta/{{$data->id}}" class="mybtntable belum-upload">Belum Upload Bukti</a>
                                                    </td>
                                                @endif 
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        
                                    </table>
                            </div>
                            
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