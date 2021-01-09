@extends('backend.template.template')
@section('content')
<div class="row py-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu Engine</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('menu-engine.save') }}" method="POST">
                    @csrf()
                    <input type="hidden" name="menu_level_1_id" value="{{ $id_encrypt ?? '' }}">
                    <div class="form-group">
                        <label class="col-form-label">Nama</label>
                        <input type="text" class="form-control @error('menu_level_1_nama') {{ 'is-invalid' }} @enderror" name="menu_level_1_nama" placeholder="Enter ..." value="{{ old('menu_level_1_nama') ?? $data->menu_level_1_nama ?? '' }}">
                        @error('menu_level_1_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Router</label>
                        <input type="text" class="form-control @error('menu_level_1_router') {{ 'is-invalid' }} @enderror" name="menu_level_1_router" placeholder="Enter ..."  value="{{ old('menu_level_1_router') ?? $data->menu_level_1_router ?? '' }}">
                        @error('menu_level_1_router')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Icon</label>
                        <input type="text" class="form-control @error('menu_level_1_icon') {{ 'is-invalid' }} @enderror" name="menu_level_1_icon" placeholder="Enter ..."  value="{{ old('menu_level_1_icon') ?? $data->menu_level_1_icon ?? '' }}">
                        @error('menu_level_1_icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-warning btn-sm" type="button" onclick="window.history.back()"> <i class="fa fa-history"></i> Cancel</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
