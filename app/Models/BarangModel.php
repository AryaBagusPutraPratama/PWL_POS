<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';        // Mendefinisikan nama tabel yang digunakan untuk model ini
    protected $primaryKey = 'barang_id';  // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_jual', 'harga_beli', 'image'];

    protected function image(): Attribute {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image)
        );
    }

    public function kategori():BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}