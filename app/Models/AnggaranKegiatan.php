<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranKegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kegiatan'];
    protected $table = 'anggarankegiatans';

    public function anggaranSubKegiatan()
    {
        return $this->hasMany(AnggaranSubKegiatan::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kode_kegiatan');
    }

    public function subKegiatan()
    {
        return $this->hasMany(AnggaranSubKegiatan::class, 'kode_kegiatan', 'kode_kegiatan');
    }
}
