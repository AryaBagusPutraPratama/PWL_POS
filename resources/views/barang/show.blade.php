@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="car-body">
        @empty($items)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
            Data yang Anda cari tidak ditemukan.
        </div>
        @else
        <table class="table table-bordered table-striped table-hover table-sm">
            <tr>
                <th>ID</th>
                <th>{{ $items->barang_id }}</th>
            </tr>
            <tr>
                <th>Kategori Barang</th>
                <th>{{ $items->kategori->kategori_nama }}</th>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <th>{{ $items->barang_nama }}</th>
            </tr>
            <tr>
                <th>Harga Beli</th>
                <th>{{ $items->harga_beli }}</th>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <th>{{ $items->harga_jual }}</th>
            </tr>
        </table>
        @endempty
        <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush
@push('js')
@endpush