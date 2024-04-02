{{-- @extends('layout.app') --}}
{{-- Customize layout section --}}
{{-- @section('subtitle', 'User') --}}
{{-- @section('content_header_title', 'User')
@section('content_header_subtitle', 'Create') --}}
{{-- Content body: main page content --}}
{{-- @section('content')
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
@endsection --}}

@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{ url('user') }}">
            @csrf
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Level</label>
                <div class="col-11">
                    <select class="form-control" name="level_id" id="level_id" required>
                        <option value="">- Pilih Level -</option>
                        @foreach ($level as $item)
                            <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Username</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Password</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="password" name="password" value="{{ old('nama') }}" required>
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('user') }}">User</a>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush