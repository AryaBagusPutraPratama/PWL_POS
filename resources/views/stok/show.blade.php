@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="car-body">
        @empty($stocks)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
            Data yang Anda cari tidak ditemukan.
        </div>
        @else
        <table class="table table-bordered table-striped table-hover table-sm">
            <tr>
                <th>ID</th>
                <th>{{ $stocks->stok_id }}</th>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <th>{{ $stocks->barang->barang_nama }}</th>
            </tr>
            <tr>
                <th>Nama User</th>
                <th>{{ $stocks->user->nama }}</th>
            </tr>
            <tr>
                <th>Jumlah Stok Barang</th>
                <th>{{ $stocks->stok_jumlah }}</th>
            </tr>
            <tr>
                <th>Tanggal Stok Barang</th>
                <th>{{ $stocks->stok_tanggal }}</th>
            </tr>
        </table>
        @endempty
        <a href="{{ url('stok') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush
@push('js')
@endpush