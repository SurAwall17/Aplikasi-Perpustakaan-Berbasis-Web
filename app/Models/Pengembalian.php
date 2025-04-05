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
                $denda->save();
            }
        });
    }
}
