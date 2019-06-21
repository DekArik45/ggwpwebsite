@extends('frontend.layouts.app')
@section('css')
    <style>
        ::placeholder { /* Firefox, Chrome, Opera */ 
            color: #b7b7b7 !important; 
        } 
        
        :-ms-input-placeholder { /* Internet Explorer 10-11 */ 
            color: #b7b7b7 !important; 
        } 
        
        ::-ms-input-placeholder { /* Microsoft Edge */ 
            color: #b7b7b7 !important; 
        } 
        /* Customize the label (the container) */
        .label_container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        max-width: 100%;
        font-weight: 600;
        font-size: 14px !important;
        }

        /* Hide the browser's default checkbox */
        .label_container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .label_container:hover input ~ .checkmark {
        background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .label_container input:checked ~ .checkmark {
        background-color: #000000;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        }

        /* Show the checkmark when checked */
        .label_container input:checked ~ .checkmark:after {
        display: block;
        }

        /* Style the checkmark/indicator */
        .label_container .checkmark:after {
            left: 8px;
            top: 3px;
            width: 5px;
            height: 12px;
            border: solid #ffd34e;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
@endsection
@section('class_body','')
@section('title','Daftar TBTN')
@section('daftar_tbtn', 'current-menu-item')

@section('content')

    <!-- SUB BANNER -->
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Daftar TBTN</h3>
        </div>
    </section>
    <!-- END / SUB BANNER -->
    <form action="/daftar" id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="harga" value="{{$harga}}">
    <input type="hidden" name="paket" value="{{$paket}}">
    @if ($paket == 'Standard')
        
    @else
        <input type="hidden" name="ukuran" value="{{$ukuran}}">
    @endif
        <!-- SHOP PAGE -->
        <div class="section-content" style="padding-top:0px;padding-bottom:0px;">
            <div class="container">
                <div id="peserta" class="row">
                    <div class="checkout">
                        <div class="col-md-3">
                            <div class="your-order">
                                <h4 class="xmd text-capitalize">{{$paket}}</h4>
                                <ul class="list-product">
                                    <li>
                                        {!!$fasilitas[0]!!}
                                    </li>
                                    <li>
                                        {!!$fasilitas[1]!!}
                                    </li>
                                    <li>
                                        {!!$fasilitas[2]!!}
                                        @if ($ukuran != "")
                                            <div class="qty-wrap">
                                                <span class="product-quantity">
                                                    <span class="quantity">Size</span>
                                                </span>
                                                <span class="amount">({{$ukuran}})</span>
                                            </div>    
                                        @endif
                                        
                                    </li>
                                    <li>
                                        {!!$fasilitas[3]!!}
                                    </li>
                                    <li>
                                        {!!$fasilitas[4]!!}
                                    </li>
                                </ul>
                                <div class="payment">
                                    Total
                                    <span class="amount pull-right">Rp. {{number_format($harga,0,',','.')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- CHECKOUT CONTENT -->
                        <div class="col-md-9">
                            <div class="checkout-content">
                                
                                <h4 class="xmd text-capitalize" style="font-weight:bold;">Info Peserta</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="billing_first_name">
                                            NIM <abbr class="required">*</abbr>
                                        </label>
                                        <input type="text" placeholder="Masukan NIM" required name="nim" id="billing_first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="billing_company">
                                            Nama <abbr class="required">*</abbr>
                                        </label>
                                        <input type="text" required name="nama" placeholder="Masukan Nama" id="billing_company">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="billing_email">
                                            Prodi <abbr class="required">*</abbr>
                                        </label>
                                        <select required name="prodi_id">
                                            
                                            @foreach ($prodi as $item)
                                                <option value="{{$item->id}}">{{$item->nama_prodi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="billing_phone">
                                            Phone <abbr class="required">*</abbr>
                                        </label>
                                        <input type="text" required name="no_telp" placeholder="Masukan No Telp" id="billing_phone">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="billing_email">
                                            Agama <abbr class="required">*</abbr>
                                        </label>
                                        <select required name="agama_id">
                                                
                                            @foreach ($agama as $item)
                                                <option value="{{$item->id}}">{{$item->nama_agama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="billing_phone">
                                            Penyakit Bawaan
                                        </label>
                                        <input type="text" name="penyakit_bawaan" placeholder="Masukan Penyakit Bawaan" id="billing_phone">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="billing_email">
                                            Jenis Kelamin <abbr class="required">*</abbr>
                                        </label>
                                        <select required name="jenis_kelamin">
                                            
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="billing_phone">
                                            Vegetarian
                                        </label>
                                        <select required name="vegetarian">
                                            
                                            <option value="1">Vegetarian</option>
                                            <option value="2">Tidak Vegetarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:27px;">
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="image-label" id="image-click-label">Surat Keterangan Sehat <abbr class="required">*</abbr> </label> 
                                            <label for="image" id="image-label" class="form-control"  style="font-weight: normal">Click to select the image</label>
                                            <input type="file" required name="image" id="image"  accept="image/*" style="display:none;" />
                                            <p style="    font-size: 12px;
                                            font-weight: bold;">(tidak lebih dari 1mb) </p>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="xmd text-capitalize" style="margin-top:40px;font-weight:bold;">Info Orang Tua</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Nama Orang Tua <abbr class="required">*</abbr>
                                        </label>
                                        <input type="text" required name="nama_ortu" placeholder="Masukan Nama Orang Tua" id="billing_address_1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="billing_address_1" class="">
                                            No Telp Orang Tua <abbr class="required">*</abbr>
                                        </label>
                                        <input type="text" required name="no_telp_ortu" placeholder="Masukan No Telp Orang TUa" id="billing_address_1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="label_container"> Saya setuju dengan <a target="_blank" href="/syarat_ketentuan">syarat dan ketentuan</a> yang berlaku
                                            <input type="checkbox" value="setuju" required name="syarat">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <a href="/daftar" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Previous</a>

                                <input type="button" id="btndaftar" class="awe-btn awe-btn-2 awe-btn-ar text-uppercase" value="Submit">
                            </div>
                        </div>
                        <!-- END / CHECKOUT CONTENT -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END / SHOP PAGE -->
    </form>
@endsection
 
@section('script')
<script type="text/javascript" src="{{asset('user_asset/js/lib/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/retina.min.js')}}"></script>
@endsection

@section('script2')
<script>
    
$(document).ready(function() {

    $("#image").change(function(){
        const fileName = $(this).val().split("\\");
        var inp = document.getElementById('image');
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
            $("#image-label").html(name);
        } else {
            $("#image-label").html("Click to select the product image");
        }
    });
    
    $(document).on('click', ".plus", function() {
    
        var qty = $('.qty').val();
    
        var jumlah = parseInt(qty) + 1;
        var subtotal = jumlah * 100000;
        var total = subtotal + 15000;
        $('#total').html(total);
        $('.qty').val(jumlah);
    
    });
    
    $(document).on('click', ".minus", function() {
    
        var qty = $('.qty').val();
    
        var jumlah = parseInt(qty) - 1;
    
        if (jumlah < 1) {
            jumlah = 1;
        }
        var subtotal = jumlah * 100000;
        var total = subtotal + 15000;
        $('#total').html(total);
    
        $('.qty').val(jumlah);
    });

    $(document).on('click', "#btndaftar", function() {
        harga = {{$harga}};
        paket = "{{$paket}}";
        swal({
            title: 'Confirmation',
            text: "dengan NIM : \nMemilih Paket "+paket+",seharga "+harga,            
            type: "info",
            confirmButtonColor: "#DD6B55",
            buttons: ["Tidak","Iya, Benar"],
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#form').submit();
            }
        })
    })    
});

    </script>
    @if (Session::has('Error'))
    <script>
        jQuery(document).ready(function ($) {
            $(function(){
                swal("Error", "{{Session::get('Error')}}", "error");
            });
        });
    </script>
    @endif
@endsection