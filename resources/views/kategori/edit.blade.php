@extends('layout.app')
{{-- Customize layout section --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit kategori</h3>
            </div>

            <form action="{{ route('/kategori/simpen', $data->kategori_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                     <div class="form-group">
                        <label for="kodeKategori">Kode Kategori Baru</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="ubah kode kategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori Baru</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="ubah nama kategori">
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('/kategori') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class=" btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
