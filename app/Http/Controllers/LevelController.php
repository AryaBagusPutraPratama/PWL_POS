<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\LevelDataTable;
use App\DataTables\LevelModel;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;

class LevelController extends Controller
{
    public function index(LevelDataTable  $dataTable) {
        // DB::insert('Insert into m_level(level_kode, level_nama, created_at) value(?, ?, ?)',['CUS', 'Pelanggan', now()]);
        //return 'Insert data baru berhasil';

        //$row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row.' baris';

        //$row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        //return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row.' baris';

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);

        return  $dataTable->render('level.index');
    }
    
    public function create() {
        return view('level.create');
    }

    public function store(StorePostRequest $request): RedirectResponse {
        $validated = $request->validated();

        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);

        return redirect('/level');
    }
}
