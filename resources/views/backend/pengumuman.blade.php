@extends('backend.layouts.app')
@section('pengumuman', 'active')
@section('master', 'active')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Pengumuman</h3>
                    <button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-input">
                        <i class="fa fa-plus"></i> Add New Pengumuman
                    </button>
                </div>
                <div class="box-body">
                    <table style="margin-top:10px;" id="pengumuman" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th>No.</th> --}}
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr class="data-row">
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td class="image_name">
                                        {{$item->}}
                                    </td>
                                    <td class="judul">{{ $item->judul }}</td>
                                    <td class="content">{{ $item->content }}</td>
                                    <td class="tanggal">{{ $item->tanggal }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button type="button" id="edit-item" data-item-id="{{$item->id}}" class="btn btn-warning" title="Edit">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="/admin/pengumuman/{{ $item->id }}" method="POST" class="btn-group">
                                                        @csrf
                                                        @method("DELETE")
                
                                                        <button type="button" id="delete" class="btn btn-danger" title="Delete">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
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
    </div>
</section>

{{-- add modal --}}
<div id="modal-input" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Pengumuman</h4>
            </div>
            <form action="/admin/pengumuman" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        {{ csrf_field() }}
                    
                        <div class="form-group">
                            <label for="image-label" id="image-click-label">Pengumuman Image</label>
                            <label for="image" id="image-label" class="form-control"  style="font-weight: normal">Click to select the Pengumuman image</label>
                            <input type="file" required name="image" id="image" accept="image/*" style="display:none;" />
                        </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" required name="title" class="form-control" placeholder="Title" />
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="editor1" name="content" rows="6" cols="10" placeholder="Content">
                        </textarea>
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
                <h4 class="modal-title">Edit Pengumuman</h4>
            </div>

            <form id="edit-form" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">

                    <div class="form-group">
                        <label for="image-label-edit" id="image-click-label-edit">Pengumuman Image</label>
                        <label for="image-edit" id="image-label-edit" class="form-control"  style="font-weight: normal">Click to select the Pengumuman image</label>
                        <input type="file" required name="image" id="image-edit" accept="image/*" style="display:none;"/>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="modal-edit-title" required name="title" class="form-control" placeholder="Title" />
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="editor1" id="modal-edit-content" name="content" rows="6" cols="10" placeholder="Content">
                        </textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->
@endsection

@section('script')
    
<!-- Select2 -->
<script src="{{asset ("backend/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
    $(function() {
        $("#pengumuman").DataTable();
    });

    $(function () {
        CKEDITOR.replace('editor1')
    })

</script>

<script>
    $(document).ready(function() {

        $('.select2').select2()

    //edit
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
        var name = row.children(".product_name").text();
        var price = row.children(".price").text();
        var desc = row.children(".description").text();
        var stok = row.children(".stock").text();
        var weight = row.children(".weight").text();

        $("#edit-form").attr('action', '/admin/product/'+id);
        // fill the data in the input fields
        
        $("#image-label-edit").val(name);
        $("#modal-edit-price").val(price);
        $("#modal-edit-desc").val(desc);
        $("#modal-edit-stok").val(stok);
        $("#modal-edit-weight").val(weight);
        

    })

    // on modal hide
    $('#modal-default').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })

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

    $("#image-edit").change(function(){
        const fileName = $(this).val().split("\\");
        var inp = document.getElementById('image-edit');
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
            $("#image-label-edit").html(name);
        } else {
            $("#image-label-edit").html("Click to select the product image");
        }
    });

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