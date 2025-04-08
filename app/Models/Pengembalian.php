<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pengembalian";

    public function denda(){
        return $this->hasMany(Denda::class);
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function kategori_denda(){
        return $this->belongsTo(KategoriDenda::class, 'id_kategori_denda');
    }

    public static function booted(){
        static::created(function ($pengembalian){
            $peminjaman = Peminjaman::find($pengembalian->id_peminjaman);

            if($peminjaman){
                $peminjaman->status = "kembali";
                $peminjaman->save();
                
                $buku = Buku::find($peminjaman->id_buku);
                if($buku){
                    $buku->stok += 1;
                    $buku->save();
                }

            }

            if ($pengembalian->denda > 0) {
                $denda = new Denda();
                $denda->id_pengembalian = $pengembalian->id;
                $denda->order_id = 'ORDER-' . $pengembalian->id . '-' . time();
                $denda->save();
            }
        });

        static::updated(function ($pengembalian) {
            $originalPeminjamanId = $pengembalian->getOriginal('id_peminjaman');
            $newPeminjamanId = $pengembalian->id_peminjaman;

            // Jika ID peminjaman berubah
            if ($originalPeminjamanId != $newPeminjamanId) {
                // Kurangi stok buku lama
                $oldPeminjaman = Peminjaman::find($originalPeminjamanId);
                if ($oldPeminjaman && $oldBuku = Buku::find($oldPeminjaman->id_buku)) {
                    $oldBuku->stok -= 1;
                    $oldBuku->save();
                }

                // Tambahkan stok buku baru
                $newPeminjaman = Peminjaman::find($newPeminjamanId);
                if ($newPeminjaman && $newBuku = Buku::find($newPeminjaman->id_buku)) {
                    $newBuku->stok += 1;
                    $newBuku->save();
                }
            }
        
            // Cek apakah dendanya berubah (jika > 0 dan belum ada di tabel denda)
            if ($pengembalian->denda > 0) {
                $existingDenda = Denda::where('id_pengembalian', $pengembalian->id)->first();
                
                if (!$existingDenda) {
                    $denda = new Denda();
                    $denda->id_pengembalian = $pengembalian->id;
                    $denda->save();
                }
            } else {
                // Jika dendanya jadi 0 dan sebelumnya ada denda, hapus
                Denda::where('id_pengembalian', $pengembalian->id)->delete();
            }
        });
        
    }
}
