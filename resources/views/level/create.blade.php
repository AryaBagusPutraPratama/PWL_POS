@extends('layout.template')
{{-- Customize layout section --}}
{{-- @section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create') --}}
{{-- Content body: main page content --}}
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ url('level') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="">Level Kode</label>
            <input type="text" class="form-control" id="level_kode" name="level_kode" value="{{ old('level_kode') }}" placeholder="Level Kode" required>
            @error('level_kode')
                <small class="form-text text">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label class="">Level Nama</label>
            <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ old('level_nama') }}" placeholder="Level Nama" required>
            @error('level_nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-11">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-sm btn-default ml-1" href="{{ url('level') }}">Kembali</a>
            </div>
        </div>
        </form>
    </div>
@endsection
