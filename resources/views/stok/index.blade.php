@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('transaksi/create') }}" class="btn btn-sm btn-primary -mt-1">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">- Semua -</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Nama Pengguna</small>
                        
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_transaksi">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Penjualan</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Penjualan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function () {
        var dataTransaksi = $('#table_transaksi').DataTable({
            serverSide: true,   // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
                "url": "{{ url('transaksi/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
    d.user_id = $('#user_id').val();
}

            },
            columns: [
                {
                    data: "DT_RowIndex",    // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },{
                    data: "penjualan_kode",
                    className: "",
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari
                },{
                    data: "pembeli",
                    className: "",
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari
                },{
                    data: "penjualan_tanggal",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#user_id').on('change', function() {
            dataTransaksi.ajax.reload();
        });
    });
</script>
@endpush