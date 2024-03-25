<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable) {
    /*    $data = [
            'kategori_kode' => 'SNK',
            'kategori_nama' => 'Snack/Makanan Ringan',
            'created_at' => now()
        ];
        DB::table('m_kategori')->insert($data);
        return 'Insert data baru berhasil'; */

        //$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row.' baris';

        //$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        //return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row.' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

        return $dataTable->render('kategori.index');
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request): RedirectResponse {

            // 'kategori_kode' => $request->kodeKategori,
            // 'kategori_nama' => $request->namaKategori,

            // The incoming request is valid...

            // Retrieve the validated input data
            $validated = $request->validated();

            // Retrieve a portion of the validated input data...
            $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
            $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

            // Store the post...
            return redirect('/kategori');
    }

    public function edit($id) {
        $kategori  = KategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }

    public function simpen(Request $request, $id) {
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();
        return redirect('/kategori');
    }

    public function busek($id) {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
