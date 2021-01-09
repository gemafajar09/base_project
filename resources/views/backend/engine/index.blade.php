@extends('backend.template.template')
@section('content')
<div class="row py-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="float-left">
                <h3 class="card-title">Menu Engine</h3>
            </div>
                <div class="float-right">
                    <a href="{{ route('menu-engine.add') }}" class="btn btn-outline-primary my-2 btn-sm"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success" style="display:none" id="success">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
                @endif                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:10%; text-align:center">No</th>
                            <th style="width:30%; text-align:center">Nama</th>
                            <th style="width:20%; text-align:center">Router</th>
                            <th style="width:20%; text-align:center">Icon</th>
                            <th style="width:20%; text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($menu_level_1 as $no => $row)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $row->menu_level_1_nama }}</td>
                            <td>{{ $row->menu_level_1_router }}</td>
                            <td style="text-align:center"><i class="{{ $row->menu_level_1_icon }}"></i></td>
                            <td style="text-align:center">
                                <a href="{{ route('menu-engine.edit', encrypt($row->menu_level_1_id) ) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Update</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('menu-engine.delete', encrypt($row->menu_level_1_id)) }}')"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // untuk hapus data
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }
    
</script>
@if (session('message'))
	<script>
		$('#success').show();
		setInterval(function(){ $('#success').hide(); }, 5000);
	</script>
@endif
@endsection
