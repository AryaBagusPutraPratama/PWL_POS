<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok';        // Mendefinisikan nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'stok_id';  // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['barang_id', 'user_id', 'barang_nama', 'nama', 'stok_jumlah', 'stok_tanggal'];

    public function barang():BelongsTo {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
    public function user():BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}