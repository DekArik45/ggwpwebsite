@extends('backend.layouts.app')

@section('user', 'active')
@section('master', 'active')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List User</h3>
                    <button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-input">
                        <i class="fa fa-plus"></i> Add New User
                    </button>
                </div>
                <div class="box-body">
                    <table style="margin-top:10px;" id="user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr class="data-row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="username">{{ $item->username }}</td>
                                    <td class="nama">{{ $item->nama }}</td>
                                    <td class="jabatan">{{ $item->jabatan_id }}</td>
                                    <td>
                                        <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>
                                        <form action="/admin/user/{{$item->id}}" method="POST" id="form_delete" class="btn-group">
                                            @csrf
                                            @method("DELETE")
    
                                            <button type="button" id="delete" class="btn btn-danger" title="Delete">
                                                <i class="fa fa-trash-o"></i>
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

{{-- add modal --}}
<div id="modal-input" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New User</h4>
            </div>
            <form action="/admin/user" method="POST">
                <div class="modal-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" />
                    </div>

                    <div class="form-group">
                        <label >Jabatan</label>
                        <select required class="form-control select2" data-placeholder="Select a State" style="width: 100%;" name="jabatan">
                            @foreach ($jabatan as $item_jabatan)
                                <option value="{{$item_jabatan->id}}">{{$item_jabatan->nama_jabatan}}</option>
                            @endforeach
                        </select>
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
        <!-- /Attachment Modal -->
@endsection

@section('script')
<script src="{{asset ("backend/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<script>
    $(function() {
        $("#user").DataTable();
        $('.select2').select2()
    });

</script>

<script>
$(document).ready(function() {

    $(document).on('click', "#delete", function() {
        del = this;
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",            
            type: "warning",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            showCancelButton: true,
        }, function(value) {
            if (value) {
                $(del).closest("form").submit();
            }
        })
    });

})

</script>

@endsection