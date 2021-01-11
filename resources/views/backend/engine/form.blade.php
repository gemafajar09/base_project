@extends('backend.template.template')
@section('content')
<div class="row py-3">
    <div class="col-md-6 mx-auto">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Menu Engine</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('menu-engine.save') }}" method="POST">
                    @csrf()
                    <input type="hidden" name="menu_id" value="{{ $id_encrypt ?? '' }}">
                    <div class="form-group">
                        <label class="col-form-label">Nama</label>
                        <input type="text" class="form-control" name="menu_nama" placeholder="Enter ..." value="{{ old('menu_nama') ?? $data->menu_nama ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Router</label>
                        <input type="text" class="form-control @error('menu_router') {{ 'is-invalid' }} @enderror" name="menu_router" placeholder="Enter ..."  value="{{ old('menu_router') ?? $data->menu_router ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Icon</label>
                        <input type="text" class="form-control @error('menu_icon') {{ 'is-invalid' }} @enderror" name="menu_icon" placeholder="Enter ..."  value="{{ old('menu_icon') ?? $data->menu_icon ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Level Menu</label>
                        <select name="menu_level" id="menu_level" class="form-control">
                            <option value="">-SELECT-</option>
                            <option value="1"><strong>1</strong></option>
                            <option value="2"><strong>2</strong></option>
                            <option value="3"><strong>3</strong></option>
                        </select>
                    </div>
                    <div class="form-group" id="menu1" style="display:none">
                        <label for="">Turunan Menu</label>
                        <select name="menu_level1" id="menu_level1" class="form-control">
                            <option value="">-SELECT-</option>
                            @foreach($menu1 as $menu1)
                            <option value="{{$menu1->menu_id}}"><strong>{{$menu1->menu_nama}}</strong></option>
                            @endforeach;
                        </select>
                    </div>
                    <div class="form-group" id="menu2" style="display:none">
                        <label for="">Turunan Menu</label>
                        <select name="menu_level2" id="menu_level2" class="form-control">
                            <option value="">-SELECT-</option>
                            @foreach($menu2 as $menu2)
                            <option value="{{$menu2->menu_id}}"><strong>{{$menu2->menu_nama}}</strong></option>
                            @endforeach;
                        </select>
                    </div>
                    <div align="right">
                        <button class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-warning btn-sm" type="button" onclick="window.history.back()"> <i class="fa fa-history"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var level = '<?= $data->menu_level ?? '' ?>'
        if(level == 2)
        {
            $('#menu_level1').val('<?= $data->menu_drop_id ?? '' ?>')
            $('#menu_level').val(level)
            $('#menu1').show();
            $('#menu2').hide();
        }
        else if(level == 3)
        {

            $('#menu_level2').val('<?= $data->menu_drop_id ?? '' ?>')
            $('#menu_level').val(level)
            $('#menu2').show();
            $('#menu1').hide();
        }
        else
        {
            $('#menu_level').val(level)
            $('#menu1').hide();
            $('#menu2').hide();
        }
    })

    $('#menu_level').change(function(){
        var level = $(this).val();
        if(level == 2)
        {
            $('#menu1').show();
            $('#menu2').hide();
        }
        else if(level == 3)
        {
            $('#menu2').show();
            $('#menu1').hide();
        }
        else
        {
            $('#menu1').hide();
            $('#menu2').hide();
        }
    })
</script>
@endsection
