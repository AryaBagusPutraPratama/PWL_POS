<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang'],
        ];

        $page = (object) [
            'title' => 'Daftar barang yang tersedia dalam sistem'
        ];

        $activeMenu = 'barang';
        $kategori = KategoriModel::all();
        return view('barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) {
        $items = BarangModel::select(['barang_id', 'kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual'])->with('kategori');

        // Filter data user berdasarkan level_id
        if ($request->kategori_id) {
            $items->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($items)
        ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('aksi', function ($item) {
            $btn = '<a href="'.url('/barang/' . $item->barang_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/barang/' . $item->barang_id . '/edit' ) . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/barang/'.$item->barang_id).'">'.
            csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah barang baru'
        ];

        $kategori = KategoriModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'barang'; // set menu yang sedang aktif
        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request) {
        $request->validate([
            'barang_kode' => 'required|string|min:6|max:10|unique:m_barang,barang_kode',
            'kategori_id' => 'required|integer',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',          
            'harga_jual' => 'required|integer',          
        ]);

        BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'kategori_id' => $request->kategori_id,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,          
            'harga_jual' => $request->harga_jual,  
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id) {
        $items = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Barang'
        ];

        $activeMenu = 'Barang'; // set menu yang sedang aktif

        return view('barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'items' => $items, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id) {
        $items = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];
        
        $page = (object) [
            'title' => 'Edit Barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'items' => $items, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'barang_kode' => 'required|string|min:6|max:10',
            'kategori_id' => 'required|integer',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',          
            'harga_jual' => 'required|integer',          
        ]);

        BarangModel::find($id)->update([
            'barang_kode' => $request->barang_kode,
            'kategori_id' => $request->kategori_id,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,          
            'harga_jual' => $request->harga_jual,  
        ]);

        return redirect('/barang/')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id) {
        $check = BarangModel::find($id);
        if(!$check) {   // untuk mengecek apakah data user dengan id yang dimaksd ada atau tidak
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($id); // Hapus data level

            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}