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
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            {{-- menu1 --}}
                            @foreach($menu as $menu1)
                            <div class="col-md-3">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <span><a onclick="mHapus('{{ route('menu-engine.delete', encrypt($menu1->menu_id)) }}')" role="button" style="color:rgb(44, 136, 223); cursor: pointer;" class="fa fa-trash"></a></span>
                                        <span><a href="{{ route('menu-engine.edit', encrypt($menu1->menu_id) ) }}" style="color:rgb(149, 213, 32)" class="fa fa-edit"></a></span>
                                        <strong>
                                            <i style="padding-left:5%" class="{{$menu1->menu_icon}}"></i>
                                            {{$menu1->menu_nama}}
                                        </strong> 
                                        <br>
                                            {{-- menu2 --}}
                                            <?php $menu2 = DB::table('tb_menu')->where('menu_level','2')->where('menu_drop_id',$menu1->menu_id)->get() ?>
                                            @foreach($menu2 as $menu2)
                                            <span><a onclick="mHapus('{{ route('menu-engine.delete', encrypt($menu2->menu_id)) }}')" role="button" style="color:rgb(44, 136, 223); cursor: pointer;" class="fa fa-trash"></a></span>
                                            <span><a href="{{ route('menu-engine.edit', encrypt($menu2->menu_id) ) }}" style="color:rgb(149, 213, 32)" class="fa fa-edit"></a></span>
                                            <strong style="padding-left: 5%">
                                                <i style="padding-left:5%; color:rgb(229, 233, 19)" class="far fa-circle"></i>
                                                {{$menu2->menu_nama}}
                                            </strong> 
                                            <br>
                                                {{-- menu3 --}}
                                                <?php $menu3 = DB::table('tb_menu')->where('menu_level','3')->where('menu_drop_id',$menu2->menu_id)->get() ?>
                                                @foreach($menu3 as $menu3)
                                                    <span><a onclick="mHapus('{{ route('menu-engine.delete', encrypt($menu3->menu_id)) }}')" role="button" style="color:rgb(44, 136, 223); cursor: pointer;" class="fa fa-trash"></a></span>
                                                    <span><a href="{{ route('menu-engine.edit', encrypt($menu3->menu_id) ) }}" style="color:rgb(149, 213, 32)" class="fa fa-edit"></a></span>
                                                    <strong style="padding-left: 10%">
                                                        <i style="padding-left:5%; color:rgb(174, 77, 223)" class="far fa-circle"></i>
                                                        {{$menu3->menu_nama}}
                                                    </strong> 
                                                    <br>
                                                @endforeach
                                                {{-- menu3 --}}
                                            @endforeach
                                            {{-- menu2 --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- menu1 --}}
                        </div>
                    </div>
                </div>
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
