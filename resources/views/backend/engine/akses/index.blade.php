@extends('backend.template.template')
@section('content')
<style>
    input{
        padding-right: 30%;position: absolute;left: 80%;
    }
</style>
<div class="row py-3">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
            <div class="float-left">
                <h3 class="card-title">Akses Akun</h3>
            </div>
            </div>
            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success" style="display:none" id="success">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif    
                {{-- form akses --}}
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama User</label>
                                        <select name="admin_id" class="form-control" id="">
                                            <option value="">-SELECT-</option>
                                            @foreach($user as $user)
                                            <option value="{{$user->admin_id}}">{{$user->admin_nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                @foreach($menu1 as $menu1)
                                <div class="col-md-3">
                                    <div class="card card-outline card-info">
                                        <div class="card-body">
                                            <span><i style="color:rgb(22, 56, 169)" class="far fa-circle"></i></span>
                                                <strong>{{$menu1->menu_nama}}</strong> 
                                                <input type="checkbox" value="{{$menu1->menu_id}}" name="menu1[]">
                                            <br>
                                            {{-- menu2 --}}
                                            <?php $menu2 = DB::table('tb_menu')->where('menu_level','2')->where('menu_drop_id',$menu1->menu_id)->get() ?>
                                            @foreach($menu2 as $menu2)
                                            <i style=" color:rgb(229, 233, 19)" class="far fa-circle"></i>
                                            <strong style="padding-left: 5%">
                                                {{$menu2->menu_nama}}
                                                <input type="checkbox" value="{{$menu2->menu_id}}" name="menu1[]">
                                            </strong> 
                                            <br>
                                                {{-- menu3 --}}
                                                <?php $menu3 = DB::table('tb_menu')->where('menu_level','3')->where('menu_drop_id',$menu2->menu_id)->get() ?>
                                                @foreach($menu3 as $menu3)
                                                    <i style="padding-left:5%; color:rgb(174, 77, 223)" class="far fa-circle"></i>
                                                    <strong style="padding-left: 10%">
                                                        {{$menu3->menu_nama}}
                                                        <input type="checkbox" value="{{$menu3->menu_id}}" name="menu1[]">
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
                            </div>
                        </div>
                        <div class="col-md-2 mx-auto">
                            <button type="submit" class="btn btn-outline-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
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
