<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "peminjaman";

    public function kategori_denda(){
        return $this->belongsToMany(Peminjaman::class, 'pengembalian');
    }

    //many to many
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // pastikan model User
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku'); // pastikan model Buku
    }

    protected static function booted()
    {
        static::creating(function ($peminjaman) {
            $buku = Buku::find($peminjaman->id_buku);
            if ($buku && $buku->stok >= 1) {
                $buku->stok -= 1;
                $buku->save();
            } else {
                throw new \Exception('Stok buku tidak mencukupi.');
            }
        });

        static::updating(function ($peminjaman) {
            // Ambil data lama sebelum update
            $originalBukuId = $peminjaman->getOriginal('id_buku');
            $newBukuId = $peminjaman->id_buku;
        
            // Jika buku yang dipinjam berubah
            if ($originalBukuId !== $newBukuId) {
                // Tambah stok buku lama
                $bukuLama = Buku::find($originalBukuId);
                if ($bukuLama) {
                    $bukuLama->stok += 1;
                    $bukuLama->save();
                }
        
                // Kurangi stok buku baru jika tersedia
                $bukuBaru = Buku::find($newBukuId);
                if ($bukuBaru && $bukuBaru->stok >= 1) {
                    $bukuBaru->stok -= 1;
                    $bukuBaru->save();
                } else {
                    throw new \Exception('Stok buku baru tidak mencukupi.');
                }
            }
        });
        

        static::deleting(function ($peminjaman) {
            $buku = Buku::find($peminjaman->id_buku);
            if ($buku) {
                $buku->stok += 1;
                $buku->save();
            }
        });
    }
}
