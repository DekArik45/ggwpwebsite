@extends('backend.layouts.app')

@section('fasilitas', 'active')
@section('master', 'active')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Fasilitas</h3>
                    <button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-input">
                        <i class="fa fa-plus"></i> Add New Fasilitas
                    </button>
                </div>
                <div class="box-body">
                    <table style="margin-top:10px;" id="fasilitas" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Fasilitas</th>
                                <th>Fasilitas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $item)
                                <tr class="data-row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="jenis_fasilitas">{{ $item->jenis_fasilitas }}</td>
                                    <td class="fasilitas">{{ $item->fasilitas }}</td>
                                    <td>
                                        <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>
                                        <form action="/admin/fasilitas/{{$item->id}}" method="POST" id="form_delete" class="btn-group">
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
                <h4 class="modal-title">Add New Fasilitas</h4>
            </div>
            <form action="/admin/fasilitas" method="POST">
                <div class="modal-body">
                    @csrf
                    
                    <div class="form-group">
                        <label for="jenis_fasilitas">Jenis Fasilitas</label>
                        <input type="text" name="jenis_fasilitas" class="form-control" placeholder="Nama Jenis Fasilitas" />
                    </div>

                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control" placeholder="Nama Fasilitas" />
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

    {{-- edit modal --}}
    <div class="modal fade" id="modal-default" >
        <div class="modal-dialog " >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fasilitas</h4>
                </div>
                <form id="edit-form"  method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Fasilitas</label>
                            <input type="text" name="jenis_fasilitas" class="form-control" id="modal-edit-jenis_fasilitas" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Fasilitas</label>
                            <input type="text" name="fasilitas" class="form-control" id="modal-edit-fasilitas" required autofocus>
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
        $("#fasilitas").DataTable();
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
        var jenis_fasilitas = row.children(".jenis_fasilitas").text();
        var fasilitas = row.children(".fasilitas").text();
        $("#edit-form").attr('action', '/admin/fasilitas/'+id);
        // fill the data in the input fields
        
        $("#modal-edit-fasilitas").val(fasilitas);
        $("#modal-edit-jenis_fasilitas").val(jenis_fasilitas);

    })

    // on modal hide
    $('#modal-default').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })

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

    // $(document).on('click', "#edit", function() {
    //     var form = this;
    //     swal({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, Update it!'
    //     }, function(value) {
    //         if (value) {
    //             $(form).closest("form").submit();
    //         }
    //     })
    // });

})

</script>

@endsection