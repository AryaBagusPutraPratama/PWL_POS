<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok Barang'],
        ];

        $page = (object) [
            'title' => 'Daftar stok barang yang tersedia dalam sistem'
        ];

        $activeMenu = 'stok';
        $items = BarangModel::all();
        $users = UserModel::all();
        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'items' => $items, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) {
        $stocks = StokModel::select(['stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'])->with(['barang', 'user']);

        // Filter data user berdasarkan level_id
        if ($request->barang_id) {
            $stocks->where('barang_id', $request->barang_id);
        }

        return DataTables::of($stocks)
        ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('aksi', function ($stok) {
            $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit' ) . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/stok/'.$stok->stok_id).'">'.
            csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stok Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah stok barang baru'
        ];

        $items = BarangModel::all();
        $users = UserModel::all(); 
        $activeMenu = 'stok'; 
        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'items' => $items, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request) {
        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',          
            'stok_jumlah' => 'required|integer|max:10',
        ]);

        StokModel::create([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok barang berhasil disimpan');
    }

    public function show(string $id) {
        $stocks = StokModel::with(['barang', 'user'])->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'Stok Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Stok Barang'
        ];

        $activeMenu = 'stok'; // set menu yang sedang aktif

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stocks' => $stocks, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id) {
        $stocks = StokModel::find($id);
        $items = BarangModel::all();
        $users = UserModel::all(); 

        $breadcrumb = (object) [
            'title' => 'Edit Stok Barang',
            'list' => ['Home', 'Stok Barang', 'Edit']
        ];
        
        $page = (object) [
            'title' => 'Edit Stok Barang'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stocks' => $stocks, 'items' => $items, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required',          
            'stok_jumlah' => 'required|integer|max:10',       
        ]);

        StokModel::find($id)->update([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        return redirect('/stok/')->with('success', 'Data stok barang berhasil diubah');
    }

    public function destroy(string $id) {
        $check = StokModel::find($id);
        if(!$check) {   // untuk mengecek apakah data user dengan id yang dimaksd ada atau tidak
            return redirect('/stok')->with('error', 'Data stok barang tidak ditemukan');
        }

        try {
            StokModel::destroy($id); // Hapus data level

            return redirect('/stok')->with('success', 'Data stok barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/stok')->with('error', 'Data stok barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}