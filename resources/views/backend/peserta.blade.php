@extends('backend.layouts.app')

@section('data_peserta', 'active')
@section('peserta', 'active')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Peserta</h3>
                </div>
                <div class="box-body">
                    <table style="margin-top:10px;" id="prodi" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>No Telp</th>
                                <th>Vegetarian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $item)
                                <tr class="data-row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="nim">{{ $item->nim }}</td>
                                    <td class="nama">{{ $item->nama }}</td>
                                    {{-- @foreach ($item->prodi as $item_prodi) --}}
                                        <td class="prodi">{{ $item->prodi['nama_prodi'] }}</td>
                                    {{-- @endforeach --}}
                                    <td class="no_telp">{{ $item->no_telp }}</td>
                                    <td class="vegetarian">{{ $item->vegetarian }}</td>
                                    <td style="text-align:center;width:30px;">
                                        <form action="/admin/prodi/{{$item->id}}" method="POST" id="form_delete" class="btn-group">
                                            @csrf
                                            <button type="submit" id="delete" class="btn btn-primary" title="Delete">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset ("backend/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<script>
    $(function() {
        $("#prodi").DataTable();
    });

</script>
@endsection