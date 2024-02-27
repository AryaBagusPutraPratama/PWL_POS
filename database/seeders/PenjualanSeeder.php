<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => '2024-02-27 10:00:00',
                'created_at' => '2024-02-27 10:00:00',
                'updated_at' => '2024-02-27 10:00:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Jane Doe',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => '2024-02-27 11:00:00',
                'created_at' => '2024-02-27 11:00:00',
                'updated_at' => '2024-02-27 11:00:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Alice',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => '2024-02-28 09:00:00',
                'created_at' => '2024-02-28 09:00:00',
                'updated_at' => '2024-02-28 09:00:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Bob',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => '2024-02-28 10:00:00',
                'created_at' => '2024-02-28 10:00:00',
                'updated_at' => '2024-02-28 10:00:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Eva',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => '2024-02-28 11:00:00',
                'created_at' => '2024-02-28 11:00:00',
                'updated_at' => '2024-02-28 11:00:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Charlie',
                'penjualan_kode' => 'PJN006',
                'penjualan_tanggal' => '2024-02-29 09:00:00',
                'created_at' => '2024-02-29 09:00:00',
                'updated_at' => '2024-02-29 09:00:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'David',
                'penjualan_kode' => 'PJN007',
                'penjualan_tanggal' => '2024-02-29 10:00:00',
                'created_at' => '2024-02-29 10:00:00',
                'updated_at' => '2024-02-29 10:00:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Fiona',
                'penjualan_kode' => 'PJN008',
                'penjualan_tanggal' => '2024-02-29 11:00:00',
                'created_at' => '2024-02-29 11:00:00',
                'updated_at' => '2024-02-29 11:00:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Grace',
                'penjualan_kode' => 'PJN009',
                'penjualan_tanggal' => '2024-03-01 09:00:00',
                'created_at' => '2024-03-01 09:00:00',
                'updated_at' => '2024-03-01 09:00:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Henry',
                'penjualan_kode' => 'PJN010',
                'penjualan_tanggal' => '2024-03-01 10:00:00',
                'created_at' => '2024-03-01 10:00:00',
                'updated_at' => '2024-03-01 10:00:00',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
