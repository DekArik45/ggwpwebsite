@extends('frontend.layouts.app')
@section('css')
    <style>
        .fasilitas{
            background: #eee;
            padding: 12px 15px 1px 15px;
            font-size: 14px;
            font-family: inherit;
            font-weight: 700;
        }
    </style>
@endsection
@section('class_body','')
@section('title','Detail Peserta')
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
                                        <h4 class="xmd text-capitalize">Bukti Pembayaran</h4>
                                        @if($peserta->status == '0')
                                            Batas waktu untuk meng-upload :
                                            <div id="time_out"></div>
                                            <div class="ket">Max File : 1mb</div>
                                        @else
                                            <a target="_blank" href="{{$peserta->bukti_pembayaran}}" download><img style="width:70%;" src="{{$peserta->bukti_pembayaran}}" alt=""></a>
                                            <br/>
                                        @endif
                                        @if ($peserta->status == '4')
                                            Cannot Upload Proof Of Payment
                                        @elseif($peserta->status == '1')
                                            <p style="margin-top: 9px;color: #009dbb;">Sedang Proses Verifikasi</p>
                                            {{-- <button id="upload-bukti" disabled class="btn btn-default"><i style="font-size:20px;" class="fa fa-upload"></i></button> --}}
                                        @elseif($peserta->status == '2')
                                            <a href="/download-invoice/{{$peserta->id}}" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">Download Invoice</a>
                                        @else
                                            <button id="upload-bukti" data-item-id="{{$peserta->id}}" data-toggle="modal" data-target="#modal-input-image" class="btn btn-primary" alt="upload bukti"><i style="font-size:20px;" class="fa fa-upload"></i></button>
                                        @endif
                                    </div>
                                </div>
                            <h4 class="xmd text-capitalize">Paket Peserta</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="billing_first_name">
                                                Nama Paket
                                            </label>
                                            <input type="text" required readonly value="{{$peserta->paket}}" name="nim" id="billing_first_name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="billing_company">
                                                Harga
                                            </label>
                                            <input readonly value="Rp. {{number_format($peserta->total,0,',','.')}}" type="text" required name="nama" id="billing_company">
                                        </div>
                                        @foreach ($peserta->detail_peserta as $item)
                                            <div class="col-md-6">
                                                <label for="billing_company">
                                                    Ukuran Baju
                                                </label>
                                                <input readonly value="{{$item['ukuran_baju']}}" type="text" required name="nama" id="billing_company">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="billing_company">
                                                    Qty Baju
                                                </label>
                                                
                                                <input readonly value="{{$item['qty']}}" type="text" required name="nama" id="billing_company">    
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_first_name">
                                        Fasilitas
                                    </label>
                                    @php
                                        if ($peserta->paket == 'Legendary'){
                                            $fasilitas = '<p>- Tenda </p>
                                            <p>- 2X Makan (Siang & Sore) </p>
                                            <p>- 1 Baju TBTN (<a target="_blank" href="/images/baju.jpg">Design Baju</a>) </p>
                                            <p>- Transport (Bolak - Balik) </p>
                                            <p>- Sertifikat Pengabdian </p>';
                                        }
                                        elseif ($peserta->paket == 'Standard'){
                                            $fasilitas = "<p>- Tenda </p>
                                            <p>- 2X Makan (Siang & Sore) </p>
                                            <p>- Sertifikat Pengabdian</p>";
                                        }
                                        elseif($peserta->paket == 'Premium'){
                                            $fasilitas = "<p>- Tenda </p>
                                            <p>- 2X Makan (Siang & Sore) </p>
                                            <p>- 1 Baju TBTN (<a target='_blank' href='/images/baju.jpg'>Design Baju</a>) </p>
                                            <p>- Sertifikat Pengabdian</p>";
                                        }
                                    @endphp
                                    <div class="fasilitas">
                                        {!!$fasilitas!!}
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="xmd text-capitalize">Info Peserta</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_first_name">
                                        NIM <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" required readonly value="{{$peserta->nim}}" name="nim" id="billing_first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_company">
                                        Nama <abbr class="required">*</abbr>
                                    </label>
                                    <input readonly value="{{$peserta->nama}}" type="text" required name="nama" id="billing_company">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Prodi <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" readonly value="{{$peserta->prodi->nama_prodi}}" autocomplete="off" name="prodi_id" required id="billing_courier">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Phone <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" readonly value="{{$peserta->no_telp}}" required name="no_telp" id="billing_phone">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Agama <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" readonly autocomplete="off" name="agama_id" required id="billing_courier" value="{{$peserta->agama->nama_agama}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Penyakit Bawaan 
                                    </label>
                                    <input type="text" readonly value="{{($peserta->penyakit_bawaan == null) ? "-" : $peserta->penyakit_bawaan}}" name="penyakit_bawaan" id="billing_phone">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="billing_email">
                                        Jenis Kelamin <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" autocomplete="off" name="jenis_kelamin" required id="billing_courier" readonly value="{{($peserta->jenis_kelamin == '1') ? "Laki - Laki" : "Perempuan"}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_phone">
                                        Vegetarian
                                    </label>
                                    <input type="text" autocomplete="off" readonly value="{{($peserta->vegetarian == '1') ? "Vegetarian" : "Non Vegetarian"}}" name="vegetarian" required id="billing_courier">
                                </div>
                            </div>

                            <h4 class="xmd text-capitalize">Info Orang Tua</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        Nama Orang Tua <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" readonly value="{{$peserta->nama_ortu}}" required name="nama_ortu" id="billing_address_1">
                                </div>
                                <div class="col-md-6">
                                    <label for="billing_address_1" class="">
                                        No Telp Orang Tua <abbr class="required">*</abbr>
                                    </label>
                                    <input type="text" readonly value="{{$peserta->no_telp_ortu}}" required name="no_telp_ortu" id="billing_address_1">
                                </div>
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
<div id="modal-input-image" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload Bukti Pembayaran</h4>
            </div>
            <form action="/upload-bukti/{{$peserta->id}}" method="POST" id="uploadForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    
                    <div class="form-group">
                        <label for="single-bukti-label" id="single-bukti-click-label">Bukti Pembayaran</label>
                        <label for="single-bukti" id="single-bukti-label" class="form-control"  style="font-weight: normal">Click to select the image</label>
                        <input type="file" required name="image" id="single-bukti" required accept="image/*" style="display:none;" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/retina.min.js')}}"></script>
@endsection

@section('script2')

<script>
    $("#single-bukti").change(function(){
        const fileName = $(this).val().split("\\");
        var inp = document.getElementById('single-bukti');
        var name = "";
        for (var i = 0; i < inp.files.length; ++i) {
            if (i == inp.files.length - 1) {
                name += inp.files.item(i).name;
            }
            else{
                name += inp.files.item(i).name+", ";
            }
        }

        if(fileName.length > 1){
            $("#single-bukti-label").html(name);
        } else {
            $("#single-bukti-label").html("Click to select the image");
        }
    });
</script>

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
@if ($peserta->status == '0')
<script>
        
        var timer;

        timer = setInterval(myclock, 1000);
        var c = {{$second}};
        

        function myclock() {
            --c;

            var seconds = c % 60;
            var minutes = (c - seconds) / 60;
            var minutesLeft = minutes % 60;
            var hours = (minutes - minutesLeft) / 60;
            var hoursLeft = hours % 24;
            var days = (hours - hoursLeft) / 24;

            var htmlTime = days+" Hari, ";

            if (seconds.toString().length > 1 && minutesLeft.toString().length>1) {
                htmlTime += hoursLeft + ":" + minutesLeft + ":" + seconds;
            }
            else if (seconds.toString().length < 2 && minutesLeft.toString().length>1) {
                htmlTime += hoursLeft + ":" + minutesLeft + ":0" + seconds;
            }
            else if (seconds.toString().length > 1 && minutesLeft.toString().length<2) {
                htmlTime += hoursLeft + ":0" + minutesLeft + ":" + seconds;
            }
            else if (seconds.toString().length < 2 && minutesLeft.toString().length < 2) {
                htmlTime += hoursLeft + ":0" + minutesLeft + ":0" + seconds;
            }
            document.getElementById('time_out').innerHTML = htmlTime;
        }
    // }
    
</script>   
@endif

@endsection