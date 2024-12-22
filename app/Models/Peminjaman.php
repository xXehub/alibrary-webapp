<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'user_id',   
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function buku() {
        return $this->belongsTo(Buku::class);
    }

    public function denda() {
        return $this->hasOne(Denda::class);

    }
    
}
