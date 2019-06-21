@extends('backend.layouts.app')

@section('transaksi_peserta', 'active')
@section('peserta', 'active')

@section('content')

<section class="content">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Transaksi Peserta</h3>
                </div>
                
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Belum Di Verifikasi</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Telah Di Verifikasi</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Belum Upload Bukti</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <table style="margin-top:10px;" id="peserta_unverified" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Ukuran Baju</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peserta_belum_verifikasi as $item)
                                            <tr class="data-row">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$item->nim}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        {{$item_detail->ukuran_baju}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        X{{$item_detail->qty}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$item->total}}</td>
                                                <td><img style="width:100px;" src="/{{$item->bukti_pembayaran}}" alt=""></td>
                                                <td class="status">Unverified</td>
                                                <td style="text-align:center; width:95px;">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <form action="/admin/detail_peserta/{{$item->id}}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary" title="Edit">
                                                                        <i class="fa fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                                <table style="margin-top:10px;" id="peserta_verified" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Ukuran Baju</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peserta_telah_verifikasi as $item)
                                            <tr class="data-row">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$item->nim}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        {{$item_detail->ukuran_baju}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        X{{$item_detail->qty}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$item->total}}</td>
                                                <td><img style="width:100px;" src="/{{$item->bukti_pembayaran}}" alt=""></td>
                                                <td class="status">Verified</td>
                                                <td style="text-align:center;width:95px;">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <form action="/admin/detail_peserta/{{$item->id}}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary" title="Edit">
                                                                        <i class="fa fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="box-body">
                                <table style="margin-top:10px;" id="peserta_pending" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Ukuran Baju</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peserta_belum_upload_bukti as $item)
                                            <tr class="data-row">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$item->nim}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        {{$item_detail->ukuran_baju}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->detail_peserta as $item_detail)
                                                        X{{$item_detail->qty}}<br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$item->total}}</td>
                                                <td><img style="width:100px;" src="/{{$item->bukti_pembayaran}}" alt=""></td>
                                                <td class="status">Pending</td>
                                                <td style="text-align:center; width:95px;">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <form action="/admin/detail_peserta/{{$item->id}}" method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary" title="Edit">
                                                                        <i class="fa fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
    </div>
</section>

    {{-- edit modal --}}
    <div class="modal fade" id="modal-default" >
        <div class="modal-dialog " >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Prodi</h4>
                </div>
                <form id="edit-form"  method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select required class="form-control select2" data-placeholder="Select a State" style="width: 100%;" id="modal-edit-status" name="status">
                                <option value="0">Pending</option>
                                <option value="1">Unverified</option>
                                <option value="2">Verified</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- /Attachment Modal -->
@endsection

@section('script')
<script src="{{ asset ("backend/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<script>
    $(function() {
        $("#peserta_verified").DataTable();
        $("#peserta_unverified").DataTable();
        $("#peserta_pending").DataTable();
    });

</script>

<script>
$(document).ready(function() {
    /**
    * for showing edit item popup
    */

    $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
        'backdrop': 'static'
        };
        $('#modal-default').modal(options)
    })

    // on modal show
    $('#modal-default').on('show.bs.modal', function() {
        
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('item-id');
        var status = row.children(".status").text();
        $("#edit-form").attr('action', '/admin/update_transaksi/'+id);
        // fill the data in the input fields
        if (status == "Pending") {
            status = '0';
        }
        else if(status == "Verified"){
            status = '2';
        }
        else if(status == "Unverified"){
            status = '1';
        }
        $("#modal-edit-status").val(status);

    })

    // on modal hide
    $('#modal-default').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })

})

</script>

@endsection