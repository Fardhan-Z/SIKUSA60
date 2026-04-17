<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'pengaduans';

    protected $fillable = [
        'user_id',
        'pengaduan_id',
        'tgl_tanggapan',
        'tanggapan',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
