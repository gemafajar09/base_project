@extends('backend.template.template')
@section('content')
<div class="row py-3">
    <div class="col-md-8 mx-auto">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Router</h3>
            </div>
            <div class="card-body">

                <p class="text-center">Route::<span style="color: orange">get</span>('<span style="color: green">/router</span>', '<span style="color: blue;">RouterController@index</span>')->name('<span style="color: red;">router</span>')->middleware('<span style="color: RebeccaPurple">auth</span>');</p>
                <p class="text-center">
                    <span style="border: 5px solid orange; padding: 3px;">Type</span>
                    <span style="border: 5px solid green;padding: 3px;">Url</span>
                    <span style="border: 5px solid blue;padding: 3px;">Controller</span>
                    <span style="border: 5px solid red;padding: 3px;">Name</span>
                    <span style="border: 5px solid RebeccaPurple;padding: 3px;">Middleware</span>
                </p>
            
                <form role="form" action="{{ route('router.save') }}" method="POST">
                    @csrf()
                    <input type="hidden" name="router_id" value="{{ $id_encrypt ?? '' }}">
                    <div class="form-group">
                        <label class="col-form-label">Type</label>
                        <select name="router_type" id="router_type" class="form-control @error('router_type') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option value="get">GET</option>
                            <option value="post">POST</option>
                            <option value="delete">DELETE</option>
                        </select>
                        @if(isset($data))
                        <script>
                            document.getElementById('router_type').value = '<?php echo $data->router_type ?>'
                        </script>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Url Router</label>
                        <input type="text" class="form-control @error('router_url') {{ 'is-invalid' }} @enderror" name="router_url" placeholder="Enter ..."  value="{{ old('router_url') ?? $data->router_url ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Controller Router</label>
                        <input type="text" class="form-control @error('router_controller') {{ 'is-invalid' }} @enderror" name="router_controller" placeholder="Enter ..."  value="{{ old('router_controller') ?? $data->router_controller ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Name Router</label>
                        <input type="text" class="form-control @error('router_name') {{ 'is-invalid' }} @enderror" name="router_name" placeholder="Enter ..."  value="{{ old('router_name') ?? $data->router_name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Middleware Router</label>
                        <input type="text" class="form-control @error('router_middleware') {{ 'is-invalid' }} @enderror" name="router_middleware" placeholder="Enter ..."  value="{{ old('router_middleware') ?? $data->router_middleware ?? '' }}">
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

@endsection
