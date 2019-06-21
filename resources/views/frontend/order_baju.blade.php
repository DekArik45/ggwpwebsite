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

        .quantity .qty1, .quantity .qty2, .quantity .qty3, .quantity .qty4, .quantity .qty5{
            background: none;
            width: 52px;
            border: 0;
            font-family: "Montserrat", sans-serif;
            font-size: 16px;
            color: #000;
            text-align: center;
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
    <form action="/daftar" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- SHOP PAGE -->
        <div class="section-content" style="padding-top:0px;padding-bottom:0px;">
            <div class="container">
                <div id="baju" style="padding:0px;" class="container">
                        
                    <table class="shop-table shop-cart">
                        <thead>
                            <tr>
                                <th style="width:40%;">Design Baju</th>
                                {{-- <th>Harga</th> --}}
                                <th class="product-size">Ukuran Baju</th>
                                <th class="product-quantity">Quantity</th>
                                {{-- <th class="product-subtotal">Sub Total</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                                
                            <!-- CART ITEM -->
                            <tr class="cart-item">
                                <td>
                                    <a target="_blank" href="{{asset('images/baju.jpg')}}"><img style="width:400px;" src="{{asset('images/baju.jpg')}}" alt=""></a>
                                </td>
                                <td>Rp. 60.000</td>
                                <td>
                                    <label class="label_container">S
                                        
                                        <input type="checkbox" class="{{$class}}" value="S" name="ukuran_baju" {{$checked}}>
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="{{$class}}" value="M" name="ukuran_baju">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="{{$class}}" value="L" name="ukuran_baju">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="{{$class}}" value="XL" name="ukuran_baju">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="{{$class}}" value="XXL" name="ukuran_baju">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="{{$class}}" value="XXXL" name="ukuran_baju">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        @if ($order == "premium" || $order == "legendary")
                                            <input type="number" name="qty" value="1" class="qty">
                                        @else
                                            <input type="number" name="qty" value="0" class="qty">
                                        @endif
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">100000</span>
                                </td>
                            </tr>

                            <tr class="cart-item">
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    <label class="label_container">S
                                        <input type="checkbox" class="ukuran" value="S" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="ukuran" value="M" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="ukuran" value="L" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="ukuran" value="XL" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="ukuran" value="XXL" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="ukuran" value="XXXL" name="ukuran_baju1">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus1">
                                        <input type="number" name="qty1" value="0" class="qty1">
                                        <input type="button" value="+" class="plus1">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">100000</span>
                                </td>
                            </tr>

                            <tr class="cart-item">
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    <label class="label_container">S
                                        <input type="checkbox" class="ukuran" value="S" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="ukuran" value="M" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="ukuran" value="L" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="ukuran" value="XL" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="ukuran" value="XXL" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="ukuran" value="XXXL" name="ukuran_baju2">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus2">
                                        
                                            <input type="number" name="qty2" value="0" class="qty2">
                                        
                                        <input type="button" value="+" class="plus2">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">100000</span>
                                </td>
                            </tr>

                            <tr class="cart-item">
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    <label class="label_container">S
                                        <input type="checkbox" class="ukuran" value="S" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="ukuran" value="M" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="ukuran" value="L" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="ukuran" value="XL" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="ukuran" value="XXL" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="ukuran" value="XXXL" name="ukuran_baju3">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus3">
                                        
                                            <input type="number" name="qty3" value="0" class="qty3">
                                        
                                        <input type="button" value="+" class="plus3">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">100000</span>
                                </td>
                            </tr>

                            <tr class="cart-item">
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    <label class="label_container">S
                                        <input type="checkbox" class="ukuran" value="S" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="ukuran" value="M" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="ukuran" value="L" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="ukuran" value="XL" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="ukuran" value="XXL" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="ukuran" value="XXXL" name="ukuran_baju4">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus4">
                                        
                                            <input type="number" name="qty4" value="0" class="qty4">
                                        
                                        <input type="button" value="+" class="plus4">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">100000</span>
                                </td>
                            </tr>

                            <tr class="cart-item">
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    <label class="label_container">S
                                        <input type="checkbox" class="ukuran" value="S" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">M
                                        <input type="checkbox" class="ukuran" value="M" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">L
                                        <input type="checkbox" class="ukuran" value="L" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                    <label class="label_container">XL
                                        <input type="checkbox" class="ukuran" value="XL" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXL
                                        <input type="checkbox" class="ukuran" value="XXL" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label_container">XXXL
                                        <input type="checkbox" class="ukuran" value="XXXL" name="ukuran_baju5">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus5">
                                        
                                            <input type="number" name="qty5" value="0" class="qty5">
                                        
                                        <input type="button" value="+" class="plus5">
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">Rp. 60.000</span>
                                </td>
                            </tr>
                            <!-- END / CART ITEM -->
                        </tbody>
                    </table>
                    <div class="cart-footer">
                        <div class="total">
                            
                        </div>
                        <div class="total">
                            <span>Biaya Pendaftaran:</span>
                            <span class="amount" style="margin-left: 15px;
                            float: right;
                            margin-right: 40px;">15000</span></br>
                            <span>Total Order:</span>
                            <span class="amount" id="total" style="margin-left: 15px;
                            float: right;
                            margin-right: 40px;">115000</span>
                        </div>
                    </div>
                    <div class="cart-submit text-right">
                        <div class="form-actions">
                            <a href="#peserta" role="tab" data-toggle="tab" class="awe-btn awe-btn-3 awe-btn-ar text-uppercase">Next</a>
                        </div>
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
function formatRupiah(angka, prefix){
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
    
    $(document).ready(function() {
        $(".radio-ukuran").change(function() {
            $(".radio-ukuran").prop('checked', false);
            $(this).prop('checked', true);
        });
        $(".ukuran").change(function() {
            $(".ukuran").not(this).prop('checked', false);
        });

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
            @if ($order == 'premium' || $order == 'legendary')
                jumlah = 1;
            @else
                jumlah = 0;
            @endif
            
        }
        var subtotal = jumlah * 100000;
        var total = subtotal + 15000;
        $('#total').html(total);
    
        $('.qty').val(jumlah);
    });
    
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