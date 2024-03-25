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
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="masukan username">
                    </div>
                    <div class="form-group">
                        <label for="namaUser">Nama</label>
                        <input type="text" class="form-control" id="namaUser" name="namaUser" placeholder="masukan nama ">
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level</label>
                        <input type="text" class="form-control" id="level_id" name="level_id" placeholder="pilih level">
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('/user') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </form>
        </div>
    </div>
@endsection
