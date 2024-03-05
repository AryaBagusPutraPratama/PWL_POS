<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
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

        $user = UserModel::create(
            [
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2
            ]
        );
        $user->username = 'manager12';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama', 'username']); //false

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        $user->save();

        // $user->isDirty(); // flase
        // $user->isClean(); // true
        // dd($user->isDirty());

        $user->wasChanged();  // true
        $user->wasChanged('username');  // true
        $user->wasChanged(['username', 'level_id']);  // true
        $user->wasChanged('nama');  // false
        dd($user->wasChanged(['nama', 'username']));  // true

        //return view('user', ['data' => $user]);
    }
}
