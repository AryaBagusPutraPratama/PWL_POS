@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Penjualan</th>
                    <th>Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                </tr>
                @foreach ($details as $item)
                    <tr>
                        <td>{{ $number }}</td>   
                        <td>{{ $trans->penjualan_kode }}</td>   
                        <td>{{ $trans->pembeli }}</td>   
                        <td>{{ $item->barang->barang_nama }}</td>   
                        <td>{{ $item->harga }}</td>   
                        <td>{{ $item->jumlah }}</td>   
                        <td>{{ $trans->penjualan_tanggal }}</td>   
                        <td>{{ $item->harga * $item->jumlah }}</td>   
                    </tr>
                    @php
                        $number++ 
                    @endphp 
                @endforeach
            </thead>
        </table>
        <a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush
@push('js')
@endpush