<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';

    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul_laporan',
        'lokasi',
        'tgl_pengaduan',
        'isi_laporan',
        'foto',
        'status',
        'tgl_selesai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
