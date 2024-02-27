<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 50,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 2,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 30,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 3,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 40,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 4,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 25,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 5,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 35,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 6,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 20,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 7,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 45,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 8,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 15,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 9,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 28,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ],
            [
                'barang_id' => 10,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 22,
                'created_at' => '2024-02-27 08:00:00',
                'updated_at' => '2024-02-27 08:00:00'
            ]
        ];
        DB::table('t_stok')->insert($data);
    }
}
