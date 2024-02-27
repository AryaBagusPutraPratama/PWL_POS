<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop ASUS',
                'harga_beli' => 7000000,
                'harga_jual' => 8500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'T-shirt Adidas',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Mie Instan Indomie',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Meja Belajar',
                'harga_beli' => 300000,
                'harga_jual' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Pulpen Stabilo',
                'harga_beli' => 20000,
                'harga_jual' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Smartphone Samsung',
                'harga_beli' => 6000000,
                'harga_jual' => 7500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Celana Jeans Levis',
                'harga_beli' => 300000,
                'harga_jual' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Biskuit Oreo',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Rak Buku',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Penghapus Faber Castell',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('m_barang')->insert($data);
    }
}
