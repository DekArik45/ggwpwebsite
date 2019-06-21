
@extends('frontend.layouts.app')
@section('css')
    <style>
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
@section('class_body','home')
@section('title','Daftar TBTN')
@section('daftar_tbtn', 'current-menu-item')

@section('content')
<section class="shortcode-page">
    <div class="container">
        <div class="row">
            <!-- PRICING TABLE -->
            <div class="col-md-4">
                <div class="pricing-table">
                    <!-- PRICING HEAD -->
                    <div class="pricing-heading">
                        <div class="ribbon ribbon-2">
                            <h2 class="sm text-uppercase">STANDARD</h2>
                        </div>
                    </div>
                    <!-- END / PRICING HEAD -->
        
                    <!-- PRICING BODY -->
                    <div class="pricing-body">
                        <div class="prices">
                            <span class="amount">Rp. 160.000,-</span>
                            {{-- <span class="per">per adult</span> --}}
                        </div>
        
                        <div class="pricing-hr"><span></span></div>
        
                        <ul class="pricing-list">
                            <li>Tenda</li>
                            <li>2X Makan (siang & sore)</li>
                            <li>Sertifikat Pengabdian</li>
                        </ul>
                        
                    </div>
                    <!-- END / PRICING BODY -->
        
                    <!-- PRICING FOOTER -->
                    <div class="pricing-footer">
                        <form action="/info-peserta/standard" method="POST">
                            @method("PUT")
                            @csrf
                            <button type="submit" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                                    Pilih & Daftar
                            </button>
                        </form>
                    </div>
                    <!-- END / PRICING FOOTER -->
        
                </div>
            </div>
            <!-- END / PRICING TABLE -->
        
            <!-- PRICING TABLE -->
            <div class="col-md-4">
                <div class="pricing-table">
                    <!-- PRICING HEAD -->
                    <div class="pricing-heading">
                        
                        <div class="ribbon ribbon-3">
                            <h2 class="sm text-uppercase">PREMIUM</h2>
                        </div>
                    </div>
                    <!-- END / PRICING HEAD -->
        
                    <!-- PRICING BODY -->
                    <div class="pricing-body">
                        <div class="prices">
                            <span class="amount">Rp. 200.000,-</span>
                            <span class="per">RECOMENDED</span>
                        </div>
        
                        <div class="pricing-hr"><span></span></div>
                        
                        <ul class="pricing-list">
                            
                            <li>Tenda</li>
                            <li>2X Makan (siang & sore)</li>
                            <li>1 Baju TBTN (<a target="_blank" style="font-size:12px;" href="{{asset('images/baju.jpg')}}">lihat design baju</a>)</li>
                            <li>Sertifikat Pengabdian</li>
                        </ul>
                        
                    </div>
                    <!-- END / PRICING BODY -->
        
                    <!-- PRICING FOOTER -->
                    <div class="pricing-footer">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-input" data-order="premium" id="pilih" class="awe-btn awe-btn-3 awe-btn-default text-uppercase">Pilih & Daftar</a>
                    </div>
                    <!-- END / PRICING FOOTER -->
        
                </div>
            </div>
            <!-- END / PRICING TABLE -->
        
            <!-- PRICING TABLE -->
            <div class="col-md-4">
                <div class="pricing-table">
                    <!-- PRICING HEAD -->
                    <div class="pricing-heading">
                        <div class="ribbon ribbon-2">
                            <h2 class="sm text-uppercase">LEGENDARY</h2>
                        </div>
                    </div>
                    <!-- END / PRICING HEAD -->
        
                    <!-- PRICING BODY -->
                    <div class="pricing-body">
                        <div class="prices">
                            <span class="amount">Rp. 300.000,-</span>
                            {{-- <span class="per">per adult</span> --}}
                        </div>
        
                        <div class="pricing-hr"><span></span></div>
        
                        <ul class="pricing-list">
                            <li>Tenda</li>
                            <li>2X Makan (siang & sore)</li>
                            <li>1 Baju TBTN (<a target="_blank" style="font-size:12px;" href="{{asset('images/baju.jpg')}}">lihat design baju</a>)</li>
                            <li>Transport (bolak-balik)</li>
                            <li>Sertifikat Pengabdian</li>
                        </ul>
                        
                    </div>
                    <!-- END / PRICING BODY -->
        
                    <!-- PRICING FOOTER -->
                    <div class="pricing-footer">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-input" id="pilih" data-order="legendary" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Pilih & Daftar</a>
                    </div>
                    <!-- END / PRICING FOOTER -->
        
                </div>
            </div>
            <!-- END / PRICING TABLE -->
        </div>
    </div>
    
</section>

    

@endsection

@section('script')
<div id="modal-input" class="modal fade">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Ukuran Baju</h4>
                </div>
                <form action="" id="edit-form" method="POST">
                    <div class="modal-body">
                        @method("PUT")
                        @csrf
                        
                        <label class="label_container">S
                                        
                            <input type="radio" value="S" name="ukuran_baju" checked>
                            <span class="checkmark"></span>
                        </label>
                        
                        <label class="label_container">M
                            <input type="radio" value="M" name="ukuran_baju">
                            <span class="checkmark"></span>
                        </label>
                        
                        <label class="label_container">L
                            <input type="radio" value="L" name="ukuran_baju">
                            <span class="checkmark"></span>
                        </label>
                        
                        <label class="label_container">XL
                            <input type="radio" value="XL" name="ukuran_baju">
                            <span class="checkmark"></span>
                        </label>
                        <label class="label_container">XXL
                            <input type="radio" value="XXL" name="ukuran_baju">
                            <span class="checkmark"></span>
                        </label>
                        <label class="label_container">XXXL
                            <input type="radio" value="XXXL" name="ukuran_baju">
                            <span class="checkmark"></span>
                        </label>
    
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
@endsection

@section('script2')
    <script>
        
        $(document).ready(function() {

            $(document).on('click', "#pilih", function() {
                $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

                var options = {
                'backdrop': 'static'
                };
                $('#modal-input').modal(options)
            })

            // on modal show
            $('#modal-input').on('show.bs.modal', function() {
                
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 

                // get the data
                var id = el.data('order');
                $("#edit-form").attr('action', '/info-peserta/'+id);
                // fill the data in the input fields
                
                

            })

            // on modal hide
            $('#modal-input').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            })

            $(document).on('click', "#pilih", function() {
                // $(this).addClass('trigger-clicked');
                // var el = $(".trigger-clicked");
                // var order = el.data('order');
                // location.href = "/info-peserta/"+order;
                // if (order == "premium" || order == "legendary") {
                //     swal({
                //         title: "Apakah Anda ingin menambah untuk membeli baju TBTN 2019?",
                //         text: "",
                //         icon: "info",
                //         buttons: ["Tidak, terimakasih","Iya, saya ingin"],
                //         })
                //         .then((willDelete) => {
                //         if (willDelete) {
                //             location.href = "/order-baju/"+order;
                //         } else {
                //             location.href = "/info-peserta/";
                //         }
                //     });         
                // }
                // else {
                //     swal({
                //         title: "Apakah Anda ingin membeli baju TBTN 2019?",
                //         text: "",
                //         icon: "info",
                //         buttons: ["Tidak, terimakasih","Iya, saya ingin"],
                //         })
                //         .then((willDelete) => {
                //         if (willDelete) {
                //             location.href = "/order-baju/"+order;
                //         } else {
                //             location.href = "/info-peserta/";
                //         }
                //     });
                // }
                
            });
        });
    </script>
@endsection