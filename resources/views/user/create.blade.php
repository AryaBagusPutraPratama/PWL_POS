@extends('layout.app')
{{-- Customize layout section --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambahkan User Baru</h3>
            </div>

            <form action="../user" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Username</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="masukan username">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="masukan nama ">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Level</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="pilih level">
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('/user') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
