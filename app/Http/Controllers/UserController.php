<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(UserDataTable $dataTable) {
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 5
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel

        // $data =[
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);

        // // coba akses model UserModel
        // $user = UserModel::all(); // ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // $user = UserModel::create(
        //     [
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        //     ]
        // );
        // $user->username = 'manager12';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama', 'username']); //false

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        //$user->save();

        // $user->isDirty(); // flase
        // $user->isClean(); // true
        // dd($user->isDirty());

        // $user->wasChanged();  // true
        // $user->wasChanged('username');  // true
        // $user->wasChanged(['username', 'level_id']);  // true
        // $user->wasChanged('nama');  // false
        // dd($user->wasChanged(['nama', 'username']));  // true

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $user = UserModel::with('level')->get();
        // return view('user', ['data' => $user]);

        return $dataTable->render('user.index');
    }

    public function tambah() {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request) {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id) {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request){
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

    public function create() {
       return view('user.create'); 
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        // UserModel::create([
        //     'user_username' => $request->username,
        //     'user_nama' => $request->namaUser,
        //     'user_levelId' => $request->level_id,
        // ]);
        $validated = $request->validated();

        $validated = $request->safe()->only(['user_username', 'user_nama', 'user_levelId']);
        $validated = $request->safe()->except(['user_username', 'user_nama', 'user_levelId']);
        return redirect('/user');
    }
}
